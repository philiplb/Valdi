Validators
==========

Here are all out of the box available validators shown with their name,
a description and, if needed, their parameters.

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

^^^^^
inSet
^^^^^

Validates if the value is in the given set.

**Parameters**

* set: an array of valid values

^^^^^^^^
required
^^^^^^^^

Validates if there is any value not being null or empty string. Might be one
of the most used validators.

^^
or
^^

Validator to combine other validators with a logical "or".

**Attention: The error result of this validator is not just a string, but an array. Example:

.. code-block:: php

        $validator = new Validator();
        $data = array(
            'a' => 'invalid'
        );
        $rules = array(
            'a' => array(array('or', $validator, array('email'), array('url')))
        );
        $result = $validator->isValid($rules, $data);

This results in the following validation result:

.. code-block:: php

        $result = array(
            'valid' => false,
            'errors' => array(
                'a' => array(array('or' => array('email', 'url')))
            )
        );


**Parameters**

* validator: the Validator or subclass instance which will execute the child validations
* rules 1: array of rules to combine; like
  array(array('required'), array('between', 9999, 100000))
* rules 2: array of rules to combine; like
  array(array('required'), array('between', 9999, 100000))

You can add as many more rules parameters as you need.

-------
Strings
-------

This validators handle strings.

^^^^^^^^^^^^
alphabetical
^^^^^^^^^^^^

Validates if the given value is alphabetical meaning it contains only the
characters a-z and A-Z.

^^^^^^^^^^^^^^
alphaNumerical
^^^^^^^^^^^^^^

Validates if the given value is alphanumerical meaning it contains only the
characters a-z, A-Z and 0-9.

^^^^^^^^
contains
^^^^^^^^

Validates if the parameter is within the given value.

**Parameters**

* sub value: the value which must be within the value to validate
* case sensitive: boolean value indicating whether the comparsion should be
  case sensitive; optional, defaults to true

^^^^^
email
^^^^^

Validates if the value is in the format of an email address.
^^
ip
^^

Validates if the given value is in the format of an IPv4 or IPv6 address.

^^^^
ipv4
^^^^

Validates if the given value is in the format of an IPv4 address.

^^^^
ipv6
^^^^

Validates if the given value is in the format of an IPv6 address.

^^^^^^^^^^^^^
lengthBetween
^^^^^^^^^^^^^

Compares the string length of the given value and validates if it is between
the given parameters.

**Parameters**

* min length: The mininum string length
* max length: The maximum string length

^^^^^^^^^
maxLength
^^^^^^^^^

Compares the string length of the given value and validates if it is maximal the
given parameter.

**Parameters**

* max length: The maximum string length

^^^^^^^^^
minLength
^^^^^^^^^

Compares the string length of the given value and validates if it is minimal the
given parameter.

**Parameters**

* min length: The minimal string length

^^^^^^
regexp
^^^^^^

Validates if the given value fulfills the regular expression from the parameter.

**Parameters**

* regexp: the regular expression to be fulfilled

^^^^^
value
^^^^^

Validates if the given parameter is equal to the parameter. Useful for example
for terms and conditions checkboxes.

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

^^^^^^^^
floating
^^^^^^^^

Validates if the value is in the format of a floating point number.

^^^^^^^
integer
^^^^^^^

Validates if the value is in the format of an integer number.

^^^
max
^^^

Validates if the given numerical value is maximal the given parameter.

**Parameters**

* max: The maximum

^^^
min
^^^

Validates if the given numerical value is minimal the given parameter.

**Parameters**

* min: The minimum

^^^^
slug
^^^^

Validates if the given value is a slug meaning it starts with a set of
characters (a-z, 0-9) followed by an optional set of dash (-) and more
characters (a-z, 0-9). Examples: foo, foo-bar, foo-bar-asd

^^^
url
^^^

Validates if the given parameter is an URL.

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

^^^^^^^^^^^^^^
beforeDateTime
^^^^^^^^^^^^^^

Compares the given value to the date time parameter and validates if the value
is before it.

**Parameters**

* date time: Date to compare the value to, format: Y-m-d H:i:s
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

^^^^^^^^
dateTime
^^^^^^^^

Validates if the value is in the format of a date time.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

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

^^^^^^^^^^^
inTheFuture
^^^^^^^^^^^

Compares the given value to the current date time and validates if the value
is younger.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

^^^^^^^^^
inThePast
^^^^^^^^^

Compares the given value to the current date time and validates if the value
is older.

**Parameters**

* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

^^^^^^^^^
olderThan
^^^^^^^^^

Compares the given value to the first parameter date time and validates if the
value is older.

**Parameters**

* reference date: the date to compare to
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s

^^^^^^^^^^^
youngerThan
^^^^^^^^^^^

Compares the given value to the first parameter date time and validates if the
value is younger.

**Parameters**

* reference date: the date to compare to
* date time format: To override the default date format; optional, defaults to
  Y-m-d H:i:s
