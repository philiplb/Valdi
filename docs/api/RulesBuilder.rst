-------------------
Valdi\\RulesBuilder
-------------------

.. php:namespace:: Valdi

.. php:class:: RulesBuilder

      To ease the building of the rules array.

   .. php:attr:: $rules

      Holds the rules under construction.

   .. php:method:: RulesBuilder::create()

      Creates and returns an instance.

      :returns: RulesBuilder $ the new instance

   .. php:method:: RulesBuilder::__construct()

      Constructor.

   .. php:method:: RulesBuilder::field()

      Adds a rule for a field to the set. This function takes a variable amount
      of parameters in order to cover the rule parameters. Example for a rule
      without parameter:
      field('myField', 'required')
      Example for a rule with two parameters:
      field('myField', 'between', 3, 7)

      :param string $field: the field for the rule
      :param string $rule: the rule to add

      :returns: RulesBuilder $ the instance of the called RulesBuilder in order to chain the rules creation

   .. php:method:: RulesBuilder::rule()

      Adds a rule to the set. This function takes a variable amount
      of parameters in order to cover the rule parameters. Example for a rule
      without parameter:
      rule('required')
      Example for a rule with two parameters:
      rule('between', 3, 7)

      :param string $rule: the rule to add

      :returns: RulesBuilder $ the instance of the called RulesBuilder in order to chain the rules creation

   .. php:method:: RulesBuilder::build()

      Gets the created rules. Afterwards, the RulesBuilder is emptied and ready to be used again.

      :returns: array $ the created rules