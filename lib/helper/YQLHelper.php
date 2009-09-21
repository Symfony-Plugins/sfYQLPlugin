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


/**
 * 
 * This helper function executes a SELECT Request against a YQL data table
 * 
 * @param $table_name The name of the data table as specified in YQL documentation
 * @param $columns An array with the columns to be extracted from the query
 * @param $where An string with the WHERE condition (e.g. 'query = "symfony plugins"'). WHERE Keyword is not needed
 * @param $limit An integer with the maximum number of results 
 * @param $offset An integer with the first result to be recovered.
 * @return An array with objects (Standard Class) extracted from the response
 */
function yqlSelectRequest($table_name, $columns = array("*"), $where = "", $limit = 0, $offset = 0)
{
	$url = sfConfig::get("app_yql_url_base");
	
	$query = "SELECT ".implode(",", $columns);
	$query .= " FROM ".$table_name;
	
	if ($where != "")
	{
		$query .= " WHERE ".$where;
	}
	
	if ($limit != 0)
	{
		$query .= " LIMIT ".$limit;
	}
	
	if ($offset != 0)
	{
		$query .= " OFFSET ".$offset;
	}
	
	$url .= "?q=".urlencode($query)."&format=json";
	
	$connection = curl_init($url);
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($connection, CURLOPT_HEADER, false);
	if (sfConfig::has("app_sfYQL_proxy"))
	{
		curl_setopt($connection, CURLOPT_PROXY, sfConfig::get("app_sfYQL_proxy"));
	}
	
	$result = curl_exec($connection);
	
	if (!$result)
	{
		throw new sfException(curl_error($connection), 500);
	}
	
	curl_close($connection);
	return json_decode($result);
}

?>