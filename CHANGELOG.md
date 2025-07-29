# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Added
### Changed

## 1.1.0 - 2025-07-28
### Changed
- Revert for source js files minification

## 1.0.2 - 2024-08-18
### Added
- Grunt config with task for source js files minification
### Changed
- JS files are from now on uglified
- Changed the way that script file is loaded - includes also 'load' event as trigger for js inclusion because of mobile devices issues with login button
- Stricter dependency on `magento/framework` because of `securerenderer` usage

## 1.0.1 - 2024-04-15
### Added
- 1.0.1 FedCM support (https://developers.google.com/identity/gsi/web/reference/html-reference#data-use_fedcm_for_prompt).
- 1.0.1 CHANGELOG.md introduction.
- 1.0.1 Formkey validation.
- 1.0.1 Changed the way that main js file is added to website - first user interaction is detected.

### Changed
- 1.0.1 acl.xml fix.

[unreleased]: https://github.com/collabpl/magento2-module-google-one-tap/compare/1.0.2...HEAD
[1.1.0]: https://github.com/collabpl/magento2-module-google-one-tap/compare/1.0.2...1.1.0
[1.0.2]: https://github.com/collabpl/magento2-module-google-one-tap/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/collabpl/magento2-module-google-one-tap/compare/1.0.0...1.0.1
[1.0.0]: https://github.com/collabpl/magento2-module-google-one-tap/releases/tag/1.0.0
