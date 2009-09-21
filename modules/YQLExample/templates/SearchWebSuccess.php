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

use_helper("Tag", "Form");

echo form_tag("YQLExample/SearchWeb", array("method" => "GET"));

echo input_tag("q", $search_word);

echo submit_tag("Search")
?>
</form>

<?php

if (!empty($results))
{
?>
<dl>
<?php

foreach ($results->result as $result)
{
	?>
<dt><a class="yql_search_result_link" href="<?php echo $result->url;?>"><?php echo $result->title;?></a></dt>
<dd><?php echo $result->abstract;?></dd>
<?php } ?>

</dl>

<?php include_partial("pages", array("current_page" => ($start/10)+1, "page_size" => $num_results, "number_pages" => 10, "url" => "@YQLSearchWeb?q=".$search_word))?>

<?php
}
?>