Validators
==========

Here are all out of the box available validators shown with their name,
a description and, if needed, their parameters.

All examples use a rule builder:

.. code-block:: php

        $builder = RulesBuilder::create();

------------------------
Basics and Miscellaneous
------------------------

Basic validators and everything else.

^^^^^^^
boolean
^^^^^^^

Validates if the given value is somehow a boolean one. Those are the accepted
values:

* true
* false
* 'true'
* 'false'
* 1
* 0
* '1'
* '0'
* 'on'
* 'off'
* 'yes'
* 'no'

**Example**

.. code-block:: php

        $builder->field('a', 'boolean');


^^^^^^^^^^
collection
^^^^^^^^^^

Validator to check an array value fulfilling another validator having a ruleset.

**Attention**: The error result of this validator is not just a string, but an array with each failed array index.

**Parameters**

* validator: the Validator or subclass instance which will execute the values validations
* rules: the rules the array values must fulfill, the RulesBuilder can be used of course

**Example:**

.. code-block:: php

        $validator = new Validator();
        $data = [
            'a' => ['one', 2, 'three']
        ];
        $itemRules = $builder
            ->rule('integer')
            ->build()
        ;
        $rules = $builder
            ->field('a', $validator, $itemRules)
            ->build()
        ;
        $result = $validator->isValid($rules, $data);

This results in the following validation result:

.. code-block:: php

        $result = [
            'valid' => false,
            'errors' => [
                'a' => [['collection' => [1 => ['integer'], 3 => ['integer']]]]
            ]
        ];


^^^^^^
nested
^^^^^^

Validator to check an value being again an associative array fulfilling another validator having its own set of rules.

**Attention**: The error result of this validator is not just a string, but an array with the nested validation.

**Parameters**

* validator: the Validator or subclass instance which will execute the values validations
* rules: the rules the associative array values must fulfill, the RulesBuilder can be used of course

**Example:**

.. code-block:: php

        $validator = new Validator();
        $data = [
            'a' => ['b' => 'foo']
        ];
        $nestedRules = $builder
            ->field('b', 'integer')
            ->field('b', 'required')
            ->field('c', 'required')
            ->build()
        ;
        $rules = $builder
            ->field('a', 'nested', $validator, $nestedRules)
            ->build()
        ;
        $result = $validator->isValid($rules, $data);

This results in the following validation result:

.. code-block:: php

        $result = [
            'valid' => false,
            'errors' => [
                'a' => [['nested' => ['b' => ['integer'], 'c' => ['integer', 'required']]]]
            ]
        ];

^^^^^
inSet
^^^^^

Validates if the value is in the given set.

**Parameters**

* set: an array of valid values

**Example**

.. code-block:: php

        $builder->field('a', 'inSet', ['b', 'c']);

^^^^^^^^
required
^^^^^^^^

Validates if there is any value not being null or empty string. Might be one
of the most used validators.

**Example**

.. code-block:: php

        $builder->field('a', 'required');

^^
or
^^

Validator to combine other rulesets with a logical "or".

**Attention**: The error result of this validator is not just a string, but an array.

**Parameters**

* validator: the Validator or subclass instance which will execute the child validations
* rules 1: array of rules to combine; like
  [['required'], ['between', 9999, 100000]]
* rules 2: array of rules to combine; like
  [['required'], ['between', 9999, 100000]]

You can add as many more rules parameters as you need. And to construct the actual rules,
the RulesBuilder can be used of course.

**Example:**

.. code-block:: php

        $validator = new Validator();
        $data = [
            'a' => 'invalid'
        ];
        $emailRules = $builder->rule('email')->build();
        $urlRules = $builder->rule('url')->build();
        $rules = $builder->field('a', 'or', $validator, $emailRules, $urlRules);
        $result = $validator->isValid($rules, $data);

This results in the following validation result:

.. code-block:: php

        $result = [
            'valid' => false,
            'errors' => [
                'a' => [['or' => ['email', 'url']]]
            ]
        ];

-------
Strings
-------

This validators handle strings.

^^^^^^^^^^^^
alphabetical
^^^^^^^^^^^^

Validates if the given value is alphabetical meaning it contains only the
characters a-z and A-Z.

**Example**

.. code-block:: php

        $builder->field('a', 'alphabetical');

^^^^^^^^^^^^^^
alphaNumerical
^^^^^^^^^^^^^^

Validates if the given value is alphanumerical meaning it contains only the
characters a-z, A-Z and 0-9.

**Example**

.. code-block:: php

        $builder->field('a', 'alphaNumerical');

^^^^^^^^
contains
^^^^^^^^

Validates if the parameter is within the given value.

**Parameters**

* sub value: the value which must be within the value to validate
* case sensitive: boolean value indicating whether the comparision should be
  case sensitive; optional, defaults to true

**Example**

.. code-block:: php

        $builder->field('a', 'contains', 'abc');

^^^^^
email
^^^^^

Validates if the value is in the format of an email address.

**Example**

.. code-block:: php

        $builder->field('a', 'email');

^^
ip
^^

Validates if the given value is in the format of an IPv4 or IPv6 address.

**Example**

.. code-block:: php

        $builder->field('a', 'ip');

^^^^
ipv4
^^^^

Validates if the given value is in the format of an IPv4 address.

**Example**

.. code-block:: php

        $builder->field('a', 'ipv4');

^^^^
ipv6
^^^^

Validates if the given value is in the format of an IPv6 address.

**Example**

.. code-block:: php

        $builder->field('a', 'ipv6');

^^^^^^^^^^^^^
lengthBetween
^^^^^^^^^^^^^

Compares the string length of the given value and validates if it is between
the given parameters.

**Parameters**

* min length: The minimum string length
* max length: The maximum string length

**Example**

.. code-block:: php

        $builder->field('a', 'lengthBetween', 3, 7);

^^^^^^^^^
maxLength
^^^^^^^^^

Compares the string length of the given value and validates if it is maximal the
given parameter.

**Parameters**

* max length: The maximum string length

**Example**

.. code-block:: php

        $builder->field('a', 'maxLength', 5);

^^^^^^^^^
minLength
^^^^^^^^^

Compares the string length of the given value and validates if it is minimal the
given parameter.

**Parameters**

* min length: The minimal string length

**Example**

.. code-block:: php

        $builder->field('a', 'minLength', 5);

^^^^^^
regexp
^^^^^^

Validates if the given value fulfills the regular expression from the parameter.

**Parameters**

* regexp: the regular expression to be fulfilled

**Example**

.. code-block:: php

        $builder->field('a', 'regexp', /f.o/);

^^^^
slug
^^^^

Validates if the given value is a slug meaning it starts with a set of
characters (a-z, 0-9) followed by an optional set of dash (-) and more
characters (a-z, 0-9). Examples: foo, foo-bar, foo-bar-asd

**Example**

.. code-block:: php

        $builder->field('a', 'slug');

^^^
url
^^^

Validates if the given parameter is an URL.

**Example**

.. code-block:: php

        $builder->field('a', 'url');

^^^^^
value
^^^^^

Validates if the given parameter is equal to the parameter. Useful for example
for terms and conditions checkboxes.

**Parameters**

* value: the value to check against

**Example**

.. code-block:: php

        $builder->field('a', 'value', 'checked');

---------
Numerical
---------

This validators handle integers and floats.

^^^^^^^
between
^^^^^^^

Validates if the given value is between two numerical values, but not equal to
one of them.

**Parameters**

* min: The lower boundary
* max: The upper boundary

**Example**

.. code-block:: php

        $builder->field('a', 'between', 23, 42);

^^^^^^^^
floating
^^^^^^^^

Validates if the value is in the format of a floating point number.

**Example**

.. code-block:: php

        $builder->field('a', 'floating');

^^^^^^^
integer
^^^^^^^

Validates if the value is in the format of an integer number.

**Example**

.. code-block:: php

        $builder->field('a', 'integer');

^^^
max
^^^

Validates if the given numerical value is maximal the given parameter.

**Parameters**

* max: The maximum

**Example**

.. code-block:: php

        $builder->field('a', 'max', 42);

^^^
min
^^^

Validates if the given numerical value is minimal the given parameter.

**Parameters**

* min: The minimum

**Example**

.. code-block:: php

        $builder->field('a', 'min');

---------------
Dates and Times
---------------

This validators handle date times.

^^^^^^^^^^^^^
afterDateTime
^^^^^^^^^^^^^

Compares the given value to the date time parameter and validates if the value
is after it.

**Parameters**

* date time: Date to compare the value to, format: Y-m-d H:i:s
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'afterDateTime', '2063-04-05 12:00:00');

^^^^^^^^^^^^^^
beforeDateTime
^^^^^^^^^^^^^^

Compares the given value to the date time parameter and validates if the value
is before it.

**Parameters**

* date time: Date to compare the value to, format: Y-m-d H:i:s
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'beforeDateTime', '2063-04-05 12:00:00');

^^^^^^^^
dateTime
^^^^^^^^

Validates if the value is in the format of a date time.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'dateTime');

^^^^^^^^^^^^^^^
dateTimeBetween
^^^^^^^^^^^^^^^

Compares the given value to the date time parameters and validates if the value
is between them.

**Parameters**

* date time min: Date time to which the value must be older, format: Y-m-d H:i:s
* date time max: Date time to which the value must be younger, format: Y-m-d H:i:s
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'beforeDateTime', '2063-04-05 12:00', '2366-12-28 00:30:27');

^^^^^^^^^^^
inTheFuture
^^^^^^^^^^^

Compares the given value to the current date time and validates if the value
is younger.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'inTheFuture');

^^^^^^^^^
inThePast
^^^^^^^^^

Compares the given value to the current date time and validates if the value
is older.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'inThePast');

^^^^^^^^^
olderThan
^^^^^^^^^

Compares the given value to the first parameter date time and validates if the
value is older.

**Parameters**

* reference date: the date to compare to
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'olderThan', '2063-04-05 12:00:00');

^^^^^^^^^^^
youngerThan
^^^^^^^^^^^

Compares the given value to the first parameter date time and validates if the
value is younger.

**Parameters**

* reference date: the date to compare to
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

**Example**

.. code-block:: php

        $builder->field('a', 'youngerThan', '2063-04-05 12:00:00');
