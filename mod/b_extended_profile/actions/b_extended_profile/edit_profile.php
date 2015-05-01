<?php
if (elgg_is_xhr()) {  //This is an Ajax call!

    $user_guid = get_input('guid');
    $user = get_user($user_guid);

    $section = get_input('section');

    switch ($section) {
        case 'about-me':
            $user->description = get_input('description', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0001.');
            $user->save();
            break;
        case 'education':
            $eguid = get_input('eguid', '');
            $delete = get_input('delete', '');
            $school = get_input('school', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0002.');
            $startdate = get_input('startdate', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0003.');
            $startyear = get_input('startyear');
            $enddate = get_input('enddate', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0004.');
            $endyear = get_input('endyear');
            $ongoing = get_input('ongoing');
            $program = get_input('program', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0005.');
            $field = get_input('field', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0006.');
            $access = get_input('access', 'ERROR: Ask your admin to grep: 5321GDS1111661353BB.');

            // create education object
            $education_guids = array();

            $education_list = $user->education;

            foreach ($delete as $delete_guid) {
                if ($delete_guid != NULL) {

                    if ($delete = get_entity($delete_guid)) {
                        $delete->delete();
                    }
                    if (is_array($education_list)) {
                        if(($key = array_search($delete_guid, $education_list)) !== false) {
                            unset($education_list[$key]);
                        }
                    }
                    elseif ($education_list == $delete_guid) {
                        $education_list = null;
                    }
                }
            }

            $user->education = $education_list;

            //create new education entries
            foreach ($eguid as $k => $v) {
                if ($v == "new") {
                    $education = new ElggObject();
                    $education->subtype = "education";
                    $education->owner_guid = $user_guid;
                }
                else {
                    $education = get_entity($v);
                }

                $education->title = htmlentities($school[$k]);
                $education->description = htmlentities($program[$k]);

                $education->school = htmlentities($school[$k]);
                $education->startdate = $startdate[$k];
                $education->startyear = $startyear[$k];
                $education->enddate = $enddate[$k];
                $education->endyear = $endyear[$k];
                $education->ongoing = $ongoing[$k];
                $education->program = htmlentities($program[$k]);
                $education->field = htmlentities($field[$k]);
                $education->access_id = $access;

                if($v == "new") {
                    $education_guids[] = $education->save();
                }
                else {
                    $education->save();
                }
            }

            if ($user->education == NULL) {
                $user->education = $education_guids;
            }
            else {
                $stack = $user->education;
                if (!(is_array($stack))) { $stack = array($stack); }

                if ($education_guids != NULL) {
                    $user->education = array_merge($stack, $education_guids);
                }

            }

            $user->education_access = $access;
            $user->save();

            break;
        case 'work-experience':

            $work_experience = get_input('work');
            $edit = $work_experience['edit'];
            $delete = $work_experience['delete'];

            $experience_list = $user->work;

            if (!(is_array($delete))) { $delete = array($delete); }

            foreach ($delete as $delete_guid) {
                if ($delete_guid != NULL) {

                    if ($delete = get_entity($delete_guid)) {
                        $delete->delete();
                    }
                    if (is_array($experience_list)) {
                        if (($key = array_search($delete_guid, $experience_list)) !== false) {
                            unset($experience_list[$key]);
                        }
                    }
                    elseif ($experience_list == $delete_guid) {
                        $experience_list = null;
                    }
                }
            }

            $user->work = $experience_list;
            $work_experience_guids = array();

            //create new work experience entries
            foreach ($edit as $work) {
                if ($work['eguid'] == "new") {
                    $experience = new ElggObject();
                    $experience->subtype = "experience";
                    $experience->owner_guid = $user_guid;
                }
                else {
                    $experience = get_entity($work['eguid']);
                }

                $experience->title = htmlentities($work['title']);
                $experience->description = htmlentities($work['responsibilities']);

                $experience->organization = htmlentities($work['organization']);
                $experience->startdate = $work['startdate'];
                $experience->startyear = $work['startyear'];
                $experience->enddate = $work['enddate'];
                $experience->endyear = $work['endyear'];
                $experience->ongoing = $work['ongoing'];
                $experience->responsibilities = $work['responsibilities'];
                $experience->colleagues = $work['colleagues'];
                $experience->access_id = $access;

                if($work['eguid'] == "new") {
                    $work_experience_guids[] = $experience->save();
                }
                else {
                    $experience->save();
                }
            }

            if ($user->work == NULL) {
                $user->work = $work_experience_guids;
            }
            else {
                $stack = $user->work;
                if (!(is_array($stack))) { $stack = array($stack); }

                if ($work_experience_guids != NULL) {
                    $user->work = array_merge($stack, $work_experience_guids);
                }
            }
            $user->work_access = $access;
            $user->save();

            break;

        case 'skills':
            $skillsToAdd = get_input('skillsadded', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0021.');
            $skillsToRemove = get_input('skillsremoved', 'ERROR: Ask your admin to grep: 5FH13GAHHHS0022.');
            $access = ACCESS_LOGGED_IN;

            $skill_guids = array();

            foreach ($skillsToAdd as $new_skill) {
                $skill = new ElggObject();
                $skill->subtype = "MySkill";
                $skill->title = htmlentities($new_skill);
                $skill->owner_guid = $user_guid;
                $skill->access_id = $access;
                $skill->endorsements = NULL;
                $skill_guids[] = $skill->save();
            }

            $skill_list = $user->gc_skills;

            if (!(is_array($skill_list))) { $skill_list = array($skill_list); }
            if (!(is_array($skillsToRemove))) { $skillsToRemove = array($skillsToRemove); }

            foreach ($skillsToRemove as $remove_guid) {
                if ($remove_guid != NULL) {

                    if ($remove = get_entity($remove_guid)) {
                        $remove->delete();
                    }

                    if (($key = array_search($remove_guid, $skill_list)) !== false) {
                        unset($skill_list[$key]);
                    }
                }
            }

            $user->gc_skills = $skill_list;

            if ($user->gc_skills == NULL) {
                $user->gc_skills = $skill_guids;
            }
            else {
                $stack = $user->gc_skills;
                if (!(is_array($stack))) { $stack = array($stack); }

                if ($skill_guids != NULL) {
                    $user->gc_skills = array_merge($stack, $skill_guids);
                }
            }

            //$user->gc_skills = null; // dev stuff... delete me
            //$user->skillsupgraded = NULL; // dev stuff.. delete me
            $user->save();
            
            break;
        case 'old-skills':
            $user->skillsupgraded = TRUE;
            break;
        case 'languages':
            $french = get_input('french', 'ERROR: Ask your admin to grep: ASFDJKGJKG333616.');
            $english = get_input('english', 'ERROR: Ask your admin to grep: SDFANLVNVNVNVNVNAA31566.');
            $languagesToAdd = get_input('langadded', 'ERROR: Ask your admin to grep: 5FH13FFSSGAHHHS0021.');
            $languagesToRemove = get_input('langremoved', 'ERROR: Ask your admin to grep: 5AAAAGGFH13GAH0022.');
            $access = ACCESS_LOGGED_IN;

            $user->english = $english;
            $user->french = $french;

            $user->save();
            break;
        case 'portfolio':
            $portfolio = get_input('portfolio');
            $edit = $portfolio['edit'];
            $delete = $portfolio['delete'];

            $portfolio_list = $user->portfolio;

            if (!(is_array($delete))) { $delete = array($delete); }

            foreach ($delete as $delete_guid) {
                if ($delete_guid != NULL) {

                    if ($delete = get_entity($delete_guid)) {
                        $delete->delete();
                    }
                    if (is_array($portfolio_list)) {
                        if (($key = array_search($delete_guid, $portfolio_list)) !== false) {
                            unset($portfolio_list[$key]);
                        }
                    }
                    elseif ($portfolio_list == $delete_guid) {
                        $portfolio_list = null;
                    }
                }
            }

            $user->portfolio = $portfolio_list;
            $portfolio_list_guids = array();

            //create new work experience entries
            foreach ($edit as $portfolio_edit) {
                if ($portfolio_edit['eguid'] == "new") {
                    $entry = new ElggObject();
                    $entry->subtype = "portfolio";
                    $entry->owner_guid = $user_guid;
                }
                else {
                    $entry = get_entity($portfolio_edit['eguid']);
                }

                $entry->title = htmlentities($portfolio_edit['title']);
                $entry->description = htmlentities($portfolio_edit['description']);

                $entry->link = $portfolio_edit['link'];
                $entry->pubdate = $portfolio_edit['pubdate'];
                $entry->datestamped = $portfolio_edit['datestamped'];

                $entry->access_id = $access;

                if($portfolio_edit['eguid'] == "new") {
                    $portfolio_list_guids[] = $entry->save();
                }
                else {
                    $entry->save();
                }
            }

            if ($user->portfolio == NULL) {
                $user->portfolio = $portfolio_list_guids;
            }
            else {
                $stack = $user->portfolio;
                if (!(is_array($stack))) { $stack = array($stack); }

                if ($portfolio_list_guids != NULL) {
                    $user->portfolio = array_merge($stack, $portfolio_list_guids);
                }
            }
            //$user->portfolio = null;
            $user->portfolio_access = $access;
            $user->save();

            break;

        default:
            system_message(elgg_echo("profile:saved"));

    }

    system_message(elgg_echo("profile:saved"));

}
else {  // In case this view will be called via the elgg_view_form() action, then we know it's the basic profile only

    $user_guid = elgg_get_logged_in_user_guid(); //get_input('guid');
    $user = get_user($user_guid);

    $fields = array('name', 'title', 'department', 'phone', 'mobile', 'email');

    foreach ($fields as $field) {
        $value = get_input($field);
        $user->set($field, $value);
    }

    $weblink = array('website', 'facebook', 'google', 'github', 'twitter', 'linkedin', 'pinterest', 'tumblr', 'instagram', 'flickr', 'youtube');

    foreach ($weblink as $link) {
        $value = get_input($link);
        if (filter_var($value, FILTER_VALIDATE_URL) == false) {
            $user->set($link, $value);
        }
    }

    $user->micro = get_input('micro');
    $user->save();

    system_message(elgg_echo("profile:saved"));

    forward($user->getURL());
}