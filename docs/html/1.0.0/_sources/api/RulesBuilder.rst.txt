-------------------
Valdi\\RulesBuilder
-------------------

.. php:namespace: Valdi

.. php:class:: RulesBuilder

    To ease the building of the rules array.

    .. php:attr:: rules

        protected

        Holds the rules under construction.

    .. php:method:: create()

        Creates and returns an instance.

        :returns: RulesBuilder the new instance

    .. php:method:: __construct()

        Constructor.

    .. php:method:: addFieldRule($field, $rule)

        Adds a rule for a field to the set. This function takes a variable amount
        of parameters in order to cover the rule parameters. Example for a rule
        without parameter:
        addFieldRule('myField', 'required')
        Example for a rule with two parameters:
        addFieldRule('myField', 'between', 3, 7)

        :type $field: string
        :param $field: the field for the rule
        :type $rule: string
        :param $rule: the rule to add
        :returns: RulesBuilder the instance of the called RulesBuilder in order to chain the rules creation

    .. php:method:: addRule($rule)

        Adds a rule to the set. This function takes a variable amount
        of parameters in order to cover the rule parameters. Example for a rule
        without parameter:
        addRule('required')
        Example for a rule with two parameters:
        addRule('between', 3, 7)

        :type $rule: string
        :param $rule: the rule to add
        :returns: RulesBuilder the instance of the called RulesBuilder in order to chain the rules creation

    .. php:method:: build()

        Gets the created rules. Afterwards, the RulesBuilder is emptied and ready
        to be used again.

        :returns: array the created rules
