# Magento 2 Google One Tap Extension

The Collab_GoogleOneTap gives customers the ability to sign in to your website quickly and securely 
using their Google account. It is a secure and easy way to log in to your website without the need
to remember a password. Module utilizes [Collab_CustomerPasswordLessLogin](https://github.com/collabpl/magento2-module-customer-passwordless-login) 
module to create an account or login the user without the need of a password.

Initially module adds the button to the login form only. It is possible to add the button to any other place
by following the instructions in the [Basic usage](#basic-usage) section.


## Why choose this extension over other solutions?
We don't believe in efficient modules which have tons of options - simple as that - modules which have multiple 
options, are prepared for many integrations always have some performance footprint for application. Having this
in mind we are trying to provide simple, portable and independent modules which require some basic Magento 2 development
skills.


## PageSpeed
The way that loading external scripts is realized by this module shoudn't by any means impact Your PageSpeed score.
As google's script which is essential for providing login functionality is not something that we need to include while
rendering the site we are embedding necessary scripts only where it is needed and only after first user interaction
so no client resources are used on initial page load.


## Prerequistes
- `client_id` for Google API obtained by this [manual](https://developers.google.com/identity/oauth2/web/guides/get-google-api-clientid)
- tld domain which controlls Your Magento application, on local environment ONLY app running under `http(s)://localhost` will work (domain needs to be configured within Google's Project in Authorized JavaScript origins field.
- once `client_id` is generated and obtained it needs to be set up at Magento in Stores -> Configuration -> Collab Extensions -> Google One Tap


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
composer req collab/module-google-one-tap
bin/magento setup:upgrade
```
