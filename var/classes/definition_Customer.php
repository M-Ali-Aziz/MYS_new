<?php 

/** 
* Inheritance: no
* Variants: no


Fields Summary: 
- active [checkbox]
- firstname [firstname]
- lastname [lastname]
- gender [select]
- birthdate [date]
- customerLanguage [language]
- street [input]
- zip [input]
- city [input]
- countryCode [country]
- email [email]
- phone [input]
- profilingConsent [consent]
- manualSegments [manyToManyObjectRelation]
- calculatedSegments [advancedManyToManyObjectRelation]
- password [password]
- ssoIdentities [manyToManyObjectRelation]
- passwordRecoveryToken [input]
- passwordRecoveryTokenDate [datetime]
- idEncoded [input]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CU',
   'name' => 'Customer',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1625728416,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '\\CustomerManagementFrameworkBundle\\Model\\AbstractCustomer\\DefaultAbstractUserawareCustomer',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => false,
   'showVariants' => false,
   'fieldDefinitions' => 
  array (
  ),
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'childs' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
             'fieldtype' => 'tabpanel',
             'border' => false,
             'tabPosition' => 'top',
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Personal data',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'fieldtype' => 'checkbox',
                     'defaultValue' => 1,
                     'name' => 'active',
                     'title' => 'Active',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'fieldtype' => 'fieldset',
                     'name' => 'Person',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Person',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Firstname::__set_state(array(
                         'fieldtype' => 'firstname',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'firstname',
                         'title' => 'First name',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Lastname::__set_state(array(
                         'fieldtype' => 'lastname',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'lastname',
                         'title' => 'Last name',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Male',
                            'value' => 'male',
                          ),
                          1 => 
                          array (
                            'key' => 'Female',
                            'value' => 'female',
                          ),
                        ),
                         'width' => '',
                         'defaultValue' => '',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'name' => 'gender',
                         'title' => 'Gender',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                         'fieldtype' => 'date',
                         'queryColumnType' => 'bigint(20)',
                         'columnType' => 'bigint(20)',
                         'defaultValue' => NULL,
                         'useCurrentDate' => false,
                         'name' => 'birthdate',
                         'title' => 'Birth date',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Language::__set_state(array(
                         'fieldtype' => 'language',
                         'onlySystemLanguages' => false,
                         'width' => '',
                         'defaultValue' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'name' => 'customerLanguage',
                         'title' => 'Customer Language',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'labelWidth' => 180,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'fieldtype' => 'fieldset',
                     'name' => 'Address',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Address',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'street',
                         'title' => 'Street',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'zip',
                         'title' => 'ZIP',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'city',
                         'title' => 'City',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Country::__set_state(array(
                         'fieldtype' => 'country',
                         'width' => '',
                         'restrictTo' => '',
                         'options' => NULL,
                         'defaultValue' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'columnLength' => '190',
                         'dynamicOptions' => false,
                         'name' => 'countryCode',
                         'title' => 'Country',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'labelWidth' => 180,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'fieldtype' => 'fieldset',
                     'name' => 'Contact',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Contact',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Email::__set_state(array(
                         'fieldtype' => 'email',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'email',
                         'title' => 'E-Mail',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 255,
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => NULL,
                         'name' => 'phone',
                         'title' => 'Phone',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'labelWidth' => 180,
                     'labelAlign' => 'left',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Consent::__set_state(array(
                     'fieldtype' => 'consent',
                     'defaultValue' => 0,
                     'width' => NULL,
                     'name' => 'profilingConsent',
                     'title' => 'Profiling consent',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'icon' => NULL,
                 'labelWidth' => 140,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'name' => 'Segment',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Segment',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'fieldtype' => 'manyToManyObjectRelation',
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'relationType' => true,
                     'visibleFields' => NULL,
                     'allowToCreateNewObject' => true,
                     'optimizedAdminLoading' => false,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'CustomerSegment',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'manualSegments',
                     'title' => 'Manual segments',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
                     'allowedClassId' => 'CustomerSegment',
                     'visibleFields' => 'name',
                     'columns' => 
                    array (
                      0 => 
                      array (
                        'type' => 'number',
                        'position' => 1,
                        'key' => 'created_timestamp',
                        'id' => 'extModel44202-1',
                        'label' => 'Segment created (Timestamp)',
                        'width' => 180,
                      ),
                      1 => 
                      array (
                        'type' => 'number',
                        'position' => 2,
                        'key' => 'application_counter',
                        'id' => 'extModel44202-2',
                        'width' => 180,
                        'label' => 'Segment application counter',
                      ),
                    ),
                     'columnKeys' => 
                    array (
                      0 => 'created_timestamp',
                      1 => 'application_counter',
                    ),
                     'fieldtype' => 'advancedManyToManyObjectRelation',
                     'enableBatchEdit' => NULL,
                     'allowMultipleAssignments' => NULL,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'relationType' => true,
                     'allowToCreateNewObject' => true,
                     'optimizedAdminLoading' => false,
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'CustomerSegment',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'calculatedSegments',
                     'title' => 'Calculated segments',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'icon' => NULL,
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'name' => 'Authentication/SSO',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Authentication/SSO',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Password::__set_state(array(
                     'fieldtype' => 'password',
                     'width' => '',
                     'algorithm' => 'password_hash',
                     'salt' => '',
                     'saltlocation' => 'back',
                     'name' => 'password',
                     'title' => 'Password',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                     'fieldtype' => 'manyToManyObjectRelation',
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'relationType' => true,
                     'visibleFields' => NULL,
                     'allowToCreateNewObject' => true,
                     'optimizedAdminLoading' => false,
                     'visibleFieldDefinitions' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'SsoIdentity',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'ssoIdentities',
                     'title' => 'SSO Identities',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => '',
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'passwordRecoveryToken',
                     'title' => 'password Recovery Token',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
                     'fieldtype' => 'datetime',
                     'queryColumnType' => 'bigint(20)',
                     'columnType' => 'bigint(20)',
                     'defaultValue' => NULL,
                     'useCurrentDate' => false,
                     'name' => 'passwordRecoveryTokenDate',
                     'title' => 'password Recovery Token Date',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'icon' => NULL,
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'name' => 'Others',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Others',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => NULL,
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => NULL,
                     'name' => 'idEncoded',
                     'title' => 'Encoded ID (cmfc)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'icon' => NULL,
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'icon' => NULL,
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '/bundles/pimcorecustomermanagementframework/icons/customer.svg',
   'previewUrl' => '',
   'group' => 'CustomerManagement',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'generateTypeDeclarations' => true,
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => false,
      'creationDate' => false,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => false,
      'creationDate' => false,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
));
