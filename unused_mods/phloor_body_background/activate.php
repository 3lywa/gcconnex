<?php
/*****************************************************************************
 * Phloor Body Background                                                    *
 *                                                                           *
 * Copyright (C) 2012 Alois Leitner                                          *
 *                                                                           *
 * This program is free software: you can redistribute it and/or modify      *
 * it under the terms of the GNU General Public License as published by      *
 * the Free Software Foundation, either version 2 of the License, or         *
 * (at your option) any later version.                                       *
 *                                                                           *
 * This program is distributed in the hope that it will be useful,           *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of            *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             *
 * GNU General Public License for more details.                              *
 *                                                                           *
 * You should have received a copy of the GNU General Public License         *
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.     *
 *                                                                           *
 * "When code and comments disagree both are probably wrong." (Norm Schryer) *
 *****************************************************************************/
?>
<?php

if (get_subtype_id('object', 'phloor_background_image')) {
	update_subtype('object', 'phloor_background_image', 'PhloorBackgroundImage');
} else {
	add_subtype('object', 'phloor_background_image', 'PhloorBackgroundImage');
}
