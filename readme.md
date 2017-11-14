## MakeContactRF

MakeContactRF is a single page web form that sends an email. It includes a Vagrant Box with a custom configured LAMP stack. 

- Single page with web form that sends an email. 
- LAMP Server Stack: Ubuntu 16.04, Apache2, MongoDB, PHP7.1 
- MailHog SMTP server for testing. [https://github.com/mailhog/MailHog](https://github.com/mailhog/MailHog)

## How To Get Locally
Run:
````bash
git clone git@github.com:binarywhisperer/makecontactrf.git
vagrant up
````
If vagrant-hostmanager is not installed:
````bash
vagrant plugin install vagrant-hostmanager
````

## How To Test
- Submit form on [http://makecontact.rf](http://makecontact.rf)
- View results in MailHog web interface [http://makecontact.rf:8025](http://makecontact.rf:8025)