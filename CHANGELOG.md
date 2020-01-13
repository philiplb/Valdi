Valdi Changelog
===============

## 1.0.0

Released: Upcoming

- Valdi itself entered the 1.0!
- Attention: The minimum required PHP version is now 7.0

## 0.12.0

Released: 2019-09-09

- Attention: Renamed the RuleBuilder function "addFieldRule" to "field"
- Attention: Renamed the RuleBuilder function "addRule" to "rule"
- Added examples to all validators to the manual

## 0.11.0

Released: 2019-07-30

- Attention: The "or" validator now accepts complete rules instead of parts so the RulesBuilder and actually more
  complex rules can be used
- Attention: The RulesBuilder function "getRules" got renamed to "build" with an additional reset of the rules builder
- Attention: Renamed the RuleBuilder function "addRule" to "addFieldRule" and added a new version of "addRule" without a
  $field parameter so Rules for collection, nested and or validators can be build with it
- Added a collection validator
- Added a nested validator

## 0.10.0

Released: 2016-08-30

- Attention: The minimum PHP version is now 5.5
- Switched to the array shorthand
- Switched the versioning to SemVer

## 0.9.0

Released: 2016-07-17

First release.
