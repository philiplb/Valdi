The Rules Data Structure
========================

You don't have to use the RulesBuilder. It's output is just a big array. You
might want to serialize/deserialize it manually. So here is it's structure:

Rules is an array with a field name as key and an array of rules to use for this
field. Each rule is an array  with the validator name as first element and
parameters as following elements. So our getting started example translates to:

.. code-block:: php

    $rules = [
        'name' => [
            ['required']
        ],
        'zipcode' => [
            ['required'],
            ['between', 9999, 100000]
        ],
        'email' => [
            ['email']
        ],
    ];
