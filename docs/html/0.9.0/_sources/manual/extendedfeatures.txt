Extended Features
=================

In this chapter, more advanced features of Valdi are shown.

---------
Own Rules
---------

There might be cases where the shipped rules of Valdi might not be enough for
you. So here is how to introduce own rules by extending Valdi.

First of all, you have to implement the validator which is a single interface
with two methods. This validator for example would validate only if the
given value can be divided by two:

.. code-block:: php

    class DivideByTwo implements Valdi\Validator\Interface {

        public function isValid($value, array $parameters) {
           return $value % 2 == 0;
        }

        public function getInvalidDetails() {
            return 'divideByTwo';
        }

    }

The method "getInvalidDetails" defines the details in the validation results
if the validation failed. Normally, it is a string naming the failed validator.
One exception is the validator "or" which returns an array here.

This validator has one small problem: It fails if the value is not given. But
it shouldn't as this check is covered by the "required" validator. So we extend
it a bit:

.. code-block:: php

    class DivideByTwo implements Valdi\Validator\Interface {

        public function isValid($value, array $parameters) {
           return in_array($value, array('', null), true) || $value % 2 == 0;
        }

        public function getInvalidDetails() {
            return 'divideByTwo';
        }

    }

Now we have a validator which we can easily add to Valdi with a rule name:

.. code-block:: php

    $validator = new Valdi\Validator();
    $validator->addValidator('divideByTwo', new DivideByTwo());

From now on, you can use the rule "divideByTwo" in your Validator instance just
like all the others.

With the addValidator method, you could even override the existing rules to
adjust them to your needs.

And while you are at it, why not give the rules back and send them to me via
a pull request? This way, everyone would benefit.

------------------------
The Rules Data Structure
------------------------

You don't have to use the RulesBuilder. It's output is just a big array. You
might want to serialize/deserialize it manually. So here is it's structure:

Rules is an array with a field name as key and an array of rules to use for this
field. Each rule is an array  with the validator name as first element and
parameters as following elements. So our getting started example translates to:

.. code-block:: php

    $rules = array(
        'name' => array(
            array('required')
        ),
        'zipcode' => array(
            array('required'),
            array('between', 9999, 100000)
        ),
        'email' => array(
            array('email')
        ),
    );
