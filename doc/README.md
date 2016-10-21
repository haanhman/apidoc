
# Time maganement system
Time maganement system api server


**Table of contents**
1. [Authentication](#Authentication)

	1.1. [/auth/refresh-token-GET](#authrefresh-token-get)
	1.1. [/auth/login-POST](#authlogin-post)
	1.1. [/auth/google-login-POST](#authgoogle-login-post)
	1.1. [/auth/auto-login-POST](#authauto-login-post)
	1.1. [/auth/logout-POST](#authlogout-post)
2. [Users](#Users)

	2.1. [/users/{user_id}/entry-GET](#usersuser_identry-get)
	2.1. [/users-GET](#users-get)
	2.1. [/users/{user_id}-GET](#usersuser_id-get)
	2.1. [/users-POST](#users-post)
	2.1. [/users/{user_id}-PUT](#usersuser_id-put)
	2.1. [/users/me-PUT](#usersme-put)
	2.1. [/users/password-PUT](#userspassword-put)
3. [Tags](#Tags)

	3.1. [/tags-GET](#tags-get)
	3.1. [/tags-POST](#tags-post)
	3.1. [/tags-PUT](#tags-put)
	3.1. [/tags/{tag_ids}-DELETE](#tagstag_ids-delete)
4. [Tasks](#Tasks)

	4.1. [/tasks-POST](#tasks-post)
	4.1. [/tasks-PUT](#tasks-put)
	4.1. [/tasks/{task_ids}-DELETE](#taskstask_ids-delete)
5. [Clients](#Clients)

	5.1. [/clients-GET](#clients-get)
	5.1. [/clients/{client_id}-GET](#clientsclient_id-get)
	5.1. [/clients-POST](#clients-post)
	5.1. [/clients-PUT](#clients-put)
	5.1. [/clients/{client_ids}-DELETE](#clientsclient_ids-delete)
6. [Projects](#Projects)

	6.1. [/projects/{project_id}/task-GET](#projectsproject_idtask-get)
	6.1. [/projects-GET](#projects-get)
	6.1. [/projects/{project_id}-GET](#projectsproject_id-get)
	6.1. [/projects/user/{user_id}-GET](#projectsuseruser_id-get)
	6.1. [/projects-POST](#projects-post)
	6.1. [/projects/{project_id}/users-POST](#projectsproject_idusers-post)
	6.1. [/projects-PUT](#projects-put)
	6.1. [/projects/{project_ids}-DELETE](#projectsproject_ids-delete)
	6.1. [/projects/user/{user_ids}-DELETE](#projectsuseruser_ids-delete)
7. [Entries](#Entries)

	7.1. [/entries-POST](#entries-post)
	7.1. [/entries-PUT](#entries-put)
	7.1. [/entries/{entry_ids}-DELETE](#entriesentry_ids-delete)
8. [Department](#Department)

	8.1. [/department-GET](#department-get)
	8.1. [/department-POST](#department-post)
	8.1. [/department-PUT](#department-put)


## Authentication

### /auth/refresh-token [GET]
*Reset API token*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|int|user data detail with access token

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /auth/login [POST]
*- HTTP Base auth with email and password*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|email|string||✓|user email|
|password|string||✓|user password|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|string|user data detail with access token

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /auth/google-login [POST]
*- HTTP Base Auth with API token: login with google account*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|email|string||✓|user email|
|google_token|string||✓|google access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|string|user data detail with access token

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /auth/auto-login [POST]
*Authentication with a session cookie (auto login)*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|user data detail with access token

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /auth/logout [POST]
*Destroy the session, logout account*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0: errors, 1: success

**Sample data**
```javascript
{sample:"data sample"}
```
--

## Users
list function for user
### /users/{user_id}/entry [GET]
*- get time entries of user, group by day
- get time entries started in a specific time range*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|access token|
|group_by|string|||day/week/month|
|start_date|string|||2016-10-01|
|end_date|string|||2016-10-30|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|all time entries of user, group by day

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /users [GET]
*- get all users with paging*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|
|limit|int|||default: 10|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list users with pagning

**Sample data**
```javascript
{data:"todo..."}
```
--

### /users/{user_id} [GET]
*- get user info with permission admin or leader*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓||

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|user info

**Sample data**
```javascript
{data:"todo..."}
```
--

### /users [POST]
*- Sign up new user*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|email|string||✓|user email|
|password|string||✓|user password|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|string|user data detail with access token

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /users/{user_id} [PUT]
*- Update user specified
- Permission: admin*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|employee_id|int|||VD: 32|
|name|string|||VD: Nguyen Van Man|
|email|string|||VD: man.nv@kayac.vn|
|password|string|||VD: 123123|
|department_id|int|||VD: 1|
|mobile	|string|||VD: 0904.488.xxx|
|permission_type|int|||VD: 1: admin, 2: leader, 3: member|
|status|int|||VD: 0/1|
|access_token|string|✓|✓|admin access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|user data detail

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /users/me [PUT]
*- Update current user*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||||
|mobile|string||||
|access_token|string|✓|✓||

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|user data detail

**Sample data**
```javascript
{sample:"data sample"}
```
--

### /users/password [PUT]
*- change password*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|old_password|string||✓|old password|
|new_password|string||✓|new password|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|user data detail

**Sample data**
```javascript
{data:"todo..."}
```
--

## Tags
tag manage
### /tags [GET]
*- get all tag*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list client (group by client name)
|data|array|list client (group by client name)

**Sample data**
```javascript
{data:"todo..."}
```
--

### /tags [POST]
*- create tag*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|int||✓|tag name|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|tag detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /tags [PUT]
*- update tag info*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||✓|tag name|
|access_token|string|✓|✓|current access token|
|tag_id|int||✓|tag id identify|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|tag detail

**Sample data**
```javascript
{data:"sample"}
```
--

### /tags/{tag_ids} [DELETE]
*- delete multiple tag*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0: errors, 1: success
|message|string|message for client

**Sample data**
```javascript
{status:1, message:"delete tag success"}
```
--

## Tasks
task manage
### /tasks [POST]
*- create a task*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|int||✓|task name|
|project_id|int||✓|project ID identify|
|access_token|int|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|task detail

**Sample data**
```javascript
{data:"doto...."}
```
--

### /tasks [PUT]
*- update task info*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|int||✓|task name|
|access_token|string|✓|✓|user access token|
|task_id|int||✓|task id identify|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|task detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /tasks/{task_ids} [DELETE]
*- delete multiple task*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|int|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0:error, 1:success
|message|string|message for client

**Sample data**
```javascript
{status:1, message:"sucess"}
```
--

## Clients
list function for clients
### /clients [GET]
*- get all clients*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|int|✓|✓|user access token|
|limit|int|||default 10|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|all client sort by (Client name)

**Sample data**
```javascript
{"data":"todo..."}
```
--

### /clients/{client_id} [GET]
*- get one client specified*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|Client detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /clients [POST]
*- create a client*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||✓|client name|
|description|string||||
|status|int|||client status, 0/1, default = 1|
|access_token|string|✓|✓|user access token|
|user_id|int|✓|✓|ID identify user|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|client detail

**Sample data**
```javascript
{data: "sample..."}
```
--

### /clients [PUT]
*- update client info*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||✓|client name|
|description|string||||
|access_token|string|✓|✓|user access token|
|client_id|int||✓|client id identify|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0/1: 0: error, 1: success
|message|string|message for client

**Sample data**
```javascript
{"status":1,"message":"update client success"}
```
--

### /clients/{client_ids} [DELETE]
*- delete multiple client*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0: errors, 1: success
|message|string|message for client

**Sample data**
```javascript
{status:1,message:"delete client success"}
```
--

## Projects
project manage
### /projects/{project_id}/task [GET]
*- get all task by project*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list task by project

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects [GET]
*- get all projects*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|
|limit|int|||default: 10|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list project

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects/{project_id} [GET]
*- get project detail
- return all info, user, task, tag, ...*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|project detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects/user/{user_id} [GET]
*- get all project by user*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list projects by user

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects [POST]
*- create a project*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|client_id|int|||client id identify|
|name|string||✓|project name|
|description|string||||
|access_token|int||✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|project detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects/{project_id}/users [POST]
*- add user into project*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|
|user_ids|string||✓|list user into add to project|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|todo

**Sample data**
```javascript
{data:"todo"}
```
--

### /projects [PUT]
*- update project info*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|project_id|int||✓|project ID identify|
|client_id|int||||
|name|string||✓||
|description|string||||
|status|int||✓|0/1|
|access_token|string|✓|✓||

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|project detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /projects/{project_ids} [DELETE]
*- delete multiple project*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0:error, 1:success
|message|string|message for client

**Sample data**
```javascript
{"status":0,"message":"success"}
```
--

### /projects/user/{user_ids} [DELETE]
*- delete user*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|int|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|todo

**Sample data**
```javascript
{data:"todo"}
```
--

## Entries

### /entries [POST]
*- create an entry*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|subject|string||✓||
|project_id|int||✓|project ID identify|
|task_id|int||✓|task id identify|
|start_time|string||✓|Ex: 2016-10-25 12:00 or 12:00|
|end_time|string||✓|Ex: 2016-10-25 12:30 or 12:30|
|note|string||||
|tag_id[]|array|||list tag id|
|access_token|int|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|entry detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /entries [PUT]
*- update time entry*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|subject|string||✓||
|task_id|int||✓|task id identify|
|start_time|string||✓|Ex: 2016-10-25 12:00 or 12:00|
|end_time|string||✓|Ex: 2016-10-25 12:30 or 12:30|
|note|string||||
|tag_id[]|array|||list tag id|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|entry detail

**Sample data**
```javascript
{data:"todo..."}
```
--

### /entries/{entry_ids} [DELETE]
*- delete multiple time entry*

Request method: **DELETE**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|int|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|status|int|0:error, 1:success
|message|string|message for client

**Sample data**
```javascript
{status:1, message:"success"}
```
--

## Department
department manager
### /department [GET]
*- get all department*

Request method: **GET**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|list department

**Sample data**
```javascript
{data:"todo..."}
```
--

### /department [POST]
*- create new department
- permission: admin*

Request method: **POST**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||✓|department name|
|access_token|string|✓|✓|user access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|department detail

**Sample data**
```javascript
{data:"todo"}
```
--

### /department [PUT]
*- change department name
- permission: admin*

Request method: **PUT**

**Argument**

|Name|Type|Header|Require|Descriptions|
|:---|:---|:---:|:---:|:---|
|name|string||✓|department name|
|access_token|int|✓|✓|current access token|

**Return value**

|Name|Type|Descriptions|
|:---|:---|:---|
|data|array|department detail

**Sample data**
```javascript
{data:"todo..."}
```
--

