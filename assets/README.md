# Insert project name

Insert here a short desctiption of the project, indicating who is the client and what is the purpose of the project from their point of view.

## Project overview

| SITE INFO     |             |
| ------------- | ----------- |
| **Site status**        | 🛠 Development / 🚀 Launched  |
| **Launch date**        | YYYY/MM/DD or mmm YYYY |
| **Project manager**    | [NAME](mailto:NAME@ramsalt.com) |
| **Product owner**      | Client name |
| **URL**                | https://example.com |
| **URL (staging)**      | http://staging.APP_NAME.ramsalt.wod.by/ |
| **URL (dev)**          | http://dev.APP_NAME.ramsalt.wod.by/ |
| **Design files**       | [Figma or other link](http://figma.com/..) |
| **Hosting platform**   | [Wodby](https://cloud.wodby.com/apps/....../) |
| **CMS**                | Drupal 9 |
| **Git**                | [REPONAME](https://bitbucket.org/ramsalt/?/src/master/) |
| **Chat room**          | Slack [`#proj--NAME`](https://ramsalt.slack.com/archives/C...) |
| **Project management** | [TeamWork](https://teamwork.ramsalt.com/#/projects/...) |
| **Documentation**      | [Confluence: NAME](https://kb-ramsalt.atlassian.net/wiki/spaces/...) |


## Table of Contents

- [Insert project name](#insert-project-name)
  - [Project overview](#markdown-header-project-overview)
  - [Table of Contents](#markdown-header-table-of-contents)
  - [Local environment](#markdown-header-local-environment)
    - [Docker - Docker4Drupal](#markdown-header-docker-docker4drupal)
    - [Config splits:](#markdown-header-config-splits)
  - [Theming and frontend](#markdown-header-theming-and-frontend)
    - [Theme workflow and compiling](#markdown-header-theme-workflow-and-compiling)
    - [Theme best practices](#markdown-header-theme-best-practices)
  - [Integrations](#markdown-header-integrations)
  - [Hosting and deployment](#markdown-header-hosting-and-deployment)
    - [Deployment procedure](#markdown-header-deployment-procedure)
  - [Misc notes](#markdown-header-misc-notes)
  - [Credits](#markdown-header-credits)
  - [License](#markdown-header-license)


## Local environment

Write here what is the **recommended** setup process to get the site up and running. Note that the site configuration _should not allow_ to accidentally push data to production systems if the developer does not follow the instructions here, so take care that all the informations reported here must be considered _optional_.


#### Config splits

Define the config environment used to create config splits. An example could be:

- **Environment: Dev** _(Machine name: `environment_dev`)_: Enabled by default (disabled in `settings.ramsalt.prod.php`), it disables most cache modules,
  enables Devel module and database logging.


## Theming and frontend
| FRONTEND INFO   |             |
| --------------- | ----------- |
| **Base theme**      | BaseTheme Name |
| **Module bundler**  | Webpack 5 |
| **Node version**    | v14.15.4 |
| **CSS framework**   | Bootstrap 4.6 |
| **JS framework**    | Vanilla JS - jQuery 3.5.1 |
| **Additional notes**| None |

#### Theme workflow and compiling

Explain the command and the process of the theme. An example could be:

**Compilation**: Run gulp from the awesome_theme folder.


#### Theme best practices

A description of linting, component based design and how to behave in the theme


## Integrations

Define any 3rd-party integration and any notes on it here


## Hosting and deployment

This project is hosted via Wodby and connected to CircleCI, for managing the `post-script` commands, we use the `wodby.yml` file in the docroot.
Note that the production environment should always be set to the `master` branch.


#### Deployment procedure

The best practice to consider when deploying is to do your changes on `develop` branch, make a pull-request and when approved by the PM, make a database backup of the `prod` instance in Wodby, and merge with `master`.


## Misc notes

Any miscellaneous non-categorable info you may need to add

