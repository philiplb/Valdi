------------
RulesBuilder
------------

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

    .. php:method:: addRule($field, $rule)

        Adds a rule to the set. This function takes a variable amount
        of parameters in order to cover the rule parameters. Example for a rule
        without parameter:
        addRule('myField', 'required')
        Example for a rule with two parameters:
        addRule('myField', 'between', 3, 7)

        :type $field: string
        :param $field: the field for the rule
        :type $rule: string
        :param $rule: the rule to add
        :returns: RulesBuilder the instance of the called RulesBuilder in order to chain the rules creation

    .. php:method:: getRules()

        Gets the created rules.

        :returns: array the created rules
