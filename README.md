Valdi
-----

Super simple, yet complete data validation.

Reasons to use Valdi:

* Easy to use
* Feature complete
* Lightweight, without dependencies
* Well documented
* Well tested
* Extensible

## Documentation

Find out more and get started with the documentation. This documentation is available for each version:

* [1.0.0](https://philiplb.github.io/Valdi/docs/html/1.0.0) (Upcoming)
* [0.12.0](https://philiplb.github.io/Valdi/docs/html/0.12.0)
* [0.11.0](https://philiplb.github.io/Valdi/docs/html/0.11.0)
* [0.10.0](https://philiplb.github.io/Valdi/docs/html/0.10.0)
* [0.9.0](https://philiplb.github.io/Valdi/docs/html/0.9.0)

## Package

[![Total Downloads](https://poser.pugx.org/philiplb/valdi/downloads.svg)](https://packagist.org/packages/philiplb/valdi)
[![Latest Stable Version](https://poser.pugx.org/philiplb/valdi/v/stable.svg)](https://packagist.org/packages/philiplb/valdi)
[![Latest Unstable Version](https://poser.pugx.org/philiplb/valdi/v/unstable.svg)](https://packagist.org/packages/philiplb/valdi) [![License](https://poser.pugx.org/philiplb/valdi/license.svg)](https://packagist.org/packages/philiplb/valdi)

### Stable


```json
"require": {
    "philiplb/valdi": "0.12.0"
}
```

### Bleeding Edge

```json
"require": {
    "philiplb/valdi": "1.0.x-dev"
}
```

## Build Status

[![Build Status](https://travis-ci.org/philiplb/Valdi.svg?branch=master)](https://travis-ci.org/philiplb/Valdi)
[![Code Coverage](https://scrutinizer-ci.com/g/philiplb/Valdi/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/philiplb/Valdi/?branch=master)

## Code Quality

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e6f291e0-1be6-4897-a634-8de87ac41734/mini.png)](https://insight.sensiolabs.com/projects/e6f291e0-1be6-4897-a634-8de87ac41734)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/philiplb/Valdi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/philiplb/Valdi/?branch=master)

## How to Generate the Documentation

Clone `https://github.com/avalanche123/doxphp` somewhere once and then execute:

```bash
export DOXPHPPATH="<doxphpRepo>/bin"
php generateAPIDocs.php
cd docs
make clean && make html
```