<?php
/**
 * File containing the ezcConfigurationValidationItem class
 *
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 * @package Configuration
 * @version //autogen//
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

/**
 * This class provides the result of one error item in the
 * ezcConfigurationValidationResult class.
 *
 * The reader object will create the item with location and description which is
 * passed to an ezcConfigurationValidationResult object.
 *
 * @see ezcConfigurationValidationResult
 *
 * @package Configuration
 * @version //autogen//
 */
class ezcConfigurationValidationItem extends ezcBaseStruct
{
    /**
     * The validation is an error which means the configuration cannot be read,
     * if tried an exception will be thrown.
     */
    const ERROR = 1;

    /**
     * The validation is a warning which means the configuration can be read
     * but the configuration has some issues which the user could fix.  Will
     * only used when strict validation is enabled.
     */
    const WARNING = 2;

    /**
     * The type of validation problem, one of the TYPE_ERROR or TYPE_WARNING
     * values.
     *
     * @var int
     */
    public $type = self::ERROR;

    /**
     * The name of the file where the error or warning occurred in. If this is
     * false the location is unknown.
     *
     * @var false|string
     */
    public $file = false;

    /**
     * The line number the error or warning occurred on. If this is false the
     * location is unknown.
     *
     * @var false|string
     */
    public $line = false;

    /**
     * The column number the error or warning occurred on. If this is false the
     * location is unknown.
     *
     * @var false|string
     */
    public $column = false;

    /**
     * The description of the error or warning which can be shown to the end
     * user. It should not contain the line or column number, instead set the
     * properties.
     *
     * @var string
     */
    public $description = '';

    /**
     * Technical description of the error or warning which can be shown to the
     * developer. It should not contain the line or column number, instead set
     * the properties.
     *
     * @var string
     */
    public $details = '';

    /**
     * Constructs a validation item.
     *
     * Constructs the validation item with location information and
     * description. Both the line and column numbers are 1 based.
     *
     * @param int $type The type of item, use either TYPE_ERROR or
     *            TYPE_WARNING.
     * @param string $file The filename where the error or warning occured.
     * @param int $line The line number the error or warning occured.
     * @param int $column The column number the error or warning occured.
     * @param string $description The description of the error or warning which
     *               can be shown to the end user.
     * @param string $details Technical description of the error or warning
     *               which can be shown to the developer.
     */
    public function __construct( $type, $file, $line, $column, $description, $details )
    {
        $this->type = $type;
        $this->file = $file;
        $this->line = $line;
        $this->column = $column;
        $this->description = $description;
        $this->details = $details;
    }

    /**
     * Returns a new instance of this class with the data specified by $array.
     *
     * $array contains all the data members of this class in the form:
     * array('member_name'=>value).
     *
     * __set_state makes this class exportable with var_export.
     * var_export() generates code, that calls this method when it
     * is parsed with PHP.
     *
     * @param array(string=>mixed) $array
     * @return ezcConfigurationValidationItem
     * @ignore
     */
    public static function __set_state( array $array )
    {
        return new ezcConfigurationValidationItem(
            $array['type'], $array['file'], $array['line'], $array['column'],
            $array['description'], $array['details']
        );
    }
}
?>
