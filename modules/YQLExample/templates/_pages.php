<?php
/**
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Lesser General Public License as published by
 *  the Free Software Foundation.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Lesser General Public License for more details.

 *  You should have received a copy of the GNU Lesser General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

echo "<ul>";

for ($page = max(1, $current_page - $number_pages) ; $page <  $current_page; $page++)
{
	echo "<li>".link_to($page, $url."&start=".(($page-1)*$page_size))."</li>";
}

echo "<li>".$current_page."</li>";

for ($page = $current_page+ 1; $page <  $current_page + $number_pages; $page++)
{
	echo "<li>".link_to($page, $url."&start=".(($page-1)*$page_size))."</li>";
}

echo "</ul>";
?>