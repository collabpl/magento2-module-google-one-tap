# Magento 2 Google One Tap Extension

The Collab_GoogleOneTap gives customers the ability to sign in to your website quickly and securely 
using their Google account. It is a secure and easy way to log in to your website without the need
to remember a password. Module utilizes [Collab_CustomerPasswordLessLogin](https://github.com/collabpl/magento2-module-customer-passwordless-login) 
module to create an account or login the user without the need of a password.

Initially module adds the button to the login form only. It is possible to add the button to any other place
by following the instructions in the [Basic usage](#basic-usage) section.

## Basic usage
Once You will define desired layout handler just edit it's XML file and add the following code under `<page>` node:
```xml
<update handle="collab_googleaccount_script"/>
```
Above code will make sure that all necessary scripts are loaded on the page.

Then You can add the button to any place in the layout by referencing desired block/container:
```xml
<referenceContainer name="DESIRED_CONTAINER_NAME">
    <block name="collab.googleonetap.button"
           template="Collab_GoogleOneTap::button/google.phtml"
           before="-"
           ifconfig="collab_googleonetap/general/enabled">
    </block>
</referenceContainer>
```

## Installation details
```bash
composer collab/module-google-one-tap
bin/magento setup:upgrade
```
