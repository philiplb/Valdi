Own Rules
=========

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
           return in_array($value, ['', null], true) || $value % 2 == 0;
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
