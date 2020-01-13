--------------------------------
Valdi\\Validator\\AbstractFilter
--------------------------------

.. toctree::

   Email
   Floating
   Integer
   IP
   IPv4
   IPv6
   Url

.. php:namespace:: Valdi\Validator

.. php:class:: AbstractFilter

      Base validator for PHPs filter_var function.

   .. php:method:: AbstractFilter::getFilter()

      Gets the filter to use within the validation.
      See http://php.net/manual/de/filter.filters.validate.php .

      :returns: string $ the filter to use

   .. php:method:: AbstractFilter::getFlags()

      Gets the flags to use within the validation.
      See http://php.net/manual/de/filter.filters.validate.php .

      :returns: string|null $ the flags to use

   .. php:method:: AbstractFilter::isValid()

      {@inheritdoc}