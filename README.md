# PlongeProfile
## Objective
This site allows users to visualise diving profile from the table MN90.

## How to use
On the first page (index.php), you can have access to login sections or you can create a new profile.
To create a new profile, you need to be connected.
When connected you have several things you can do:
- Create a new diving profile.
- See your diving profiles you already made.
- Change the settings of your oxygen bottle.

First we recommend you to go in your diving profiles and change default settings of your oxygen bottle. Then you can create some new profile with the "New Profile" button in the navbar.


---
## Version


## Code
Here you will find an architecture as to how the code is organized:
```
.
├── DB                                  # Folder that contain the Database preset
│   ├── bdd.sql                         # File for CREATE TABLE
│   └── mn90.sql                        # File for TABLE MN90
├── img
│   └── Logo_Plongee.png                # File for the site logo
├── JS
│   ├── ajax.js                         # File where AjaxRequest is define
│   ├── new_profile.js                  # JS File for new_profiles.php
│   ├── profiles.js                     # JS File for profiles.php
│   ├── sign_up.js                      # JS File for sign_up.php
│   └── user_profile.js  
├── PHP
│   └── vues
│       ├── components                  # Folder for header and footer html
│       │   ├── footer.php
│       │   └── header.php
│       ├── constants.php               # define constant needed to Connect to Database
│       ├── database.php                # File that containt all access
│       ├── disconnect.php              # File Display when disconnected
│       ├── index.php                   # presentation page
│       ├── login_confirmation.php      # connection confirmation page
│       ├── login.php                   # connection page
│       ├── new_profile.php             # page for creating a new profile
│       ├── profile.php                 # page for visualise profile
│       ├── request.php                 # File that containt all the request
│       ├── sign_up_confirmation.php    # inscription confirmation page
│       ├── sign_up.php                 # inscription page
│       └── user_profile.php            # page for old profile already used by 
└── README.md
```