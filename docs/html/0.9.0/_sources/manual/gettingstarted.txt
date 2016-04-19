Getting Started
===============

This chapter shows the setup and usage of Valdi.

-----
Setup
-----

Just include it in your composer.json:

.. code-block:: js

    "philiplb/valdi": "0.9.0"

And that's it.

-----
Usage
-----

The usage is simple. You create your validation rules and you validate your
data against them.

^^^^^
Rules
^^^^^

Then you have to create some validation rules your data has to fulfill. Here,
we assume you have a required name field, a zip code and an optional e-mail
address:

.. code-block:: php

    $rules = RulesBuilder::create()
        ->addRule('name', 'required')
        ->addRule('zipcode', 'required')
        ->addRule('zipcode', 'between', 9999, 100000)
        ->addRule('email', 'email')
        ->getRules()
    ;

The rules builder is a convenience class to create rules. You get an instance of
it via the create() function and add rules as long as you like in a chained style
via the addRule() function. It takes as first parameter the name of the field to
apply the rule on, then the rule name and depending on the rule, some additional
parameters. When you are done with adding rules, you get your rules set via
calling getRules().

Note that you can apply multiple rules on your fields like in the zip code field
above.

In the chapter "Extended Features", you might learn more about the rules data
structure.

^^^^^^^^^^
Validation
^^^^^^^^^^

First, create a Validator instance:

.. code-block:: php

    $validator = new Valdi\Validator();

Now you can validate your data. Here, we validate directly the HTTP POST input:

.. code-block:: php

    $validation = $validator->isValid($rules, $_POST);

You get back an array with your validation result. First of all, you can
check if something went wrong via the key 'valid'. It is either "true"
(everything valid) or "false" (something in your data is invalid).

In case of invalid data, you can find out what's wrong via the second key
"errors". It maps to an array with the fields as keys and arrays of failed
rules as values. For example, here was the name missing and the e-mail in the
wrong format:

.. code-block:: php

    $validation == array(
        'valid' => false
        'errors' => array(
            'name' => array('required'),
            'email' => array('email')
        )
    )

That's it for getting started with this library. In the next chapter, all
available rules with their parameters are listed and in the last chapter,
some more extended features are shown and how to extend Valdi with own rules.
