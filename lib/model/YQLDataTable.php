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
 * This class encapsulates all the access to a data table in YQL.
 * 
 * @author brenes
 */
class YQLDataTable
{

	private $table_name;
	
	/**
	 * Return the name of the data table.
	 * 
	 * @return String The name of the data table
	 */
	public function getTableName()
	{
		return $this->table_name;
	}
	
	/**
	 * Sets the name of the data table
	 * 
	 * @param $table_name String with the name of the data table.
	 */
	public function setTableName($table_name)
	{
		$this->table_name = $table_name;	
	}
	
	/**
	 * Constructor of the class. It receives the name of the data table.
	 * 
	 * @param $table_name String with the name of the data table.
	 */
	public function __construct($table_name)
	{
		$this->setTableName($table_name);
	}
	
	/**
	 * Method that executes a select statement against the data table.
	 * 
	 * @param $columns An array with the columns to be extracted from the query
	 * @param $where An string with the WHERE condition (e.g. 'query = "symfony plugins"'). WHERE Keyword is not needed
	 * @param $limit An integer with the maximum number of results 
	 * @param $offset An integer with the first result to be recovered.
	 * @return Array with objects (Standard Class) storing the results for the select statement
	 */
	public function select($columns = array("*"), $where = "", $limit = 0, $offset = 0)
	{
		sfLoader::loadHelpers(array("YQL"));

		$results = yqlSelectRequest($this->getTableName(), $columns, $where, $limit, $offset);
		
		return $results->query->results;
	}
	
}
?>