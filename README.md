# [POST] api/contacts → create a new contact.
![Create New Contact](https://user-images.githubusercontent.com/68288783/140955817-308067fb-6680-405e-a13a-5746e7e2aa14.PNG)

# [GET] api/contact?q=nama&label=teman-kantor get a list of contacts
![Get a list of contacts based on query](https://user-images.githubusercontent.com/68288783/141034056-a93ed9b6-0438-47f9-be38-f1367152eecb.PNG)
## Filter contacts by a label slug
![image](https://user-images.githubusercontent.com/68288783/141034588-2cd26fc0-f96e-4050-9ea5-79b70bed6894.png)
## q: search by name, email, phone, notes
![Get a list of contacts based on label only 2](https://user-images.githubusercontent.com/68288783/141034770-25da062f-e410-4b2e-91de-d1561fb97fd0.PNG)

# CRUD Contacts [Method] | URI
## [POST] api/contacts Create new contact 
![Create New Contact](https://user-images.githubusercontent.com/68288783/141034947-2407ef6a-709d-41c0-b932-8c991f713547.PNG)
## [GET] api/contacts Show all contacts
![Show All Contacts](https://user-images.githubusercontent.com/68288783/141035114-05ba15ca-45de-4db9-b50f-731ee2dbf6b3.PNG)
## [PUT] api/contacts/id Update contact
![image](https://user-images.githubusercontent.com/68288783/141035289-56114422-0359-4dff-a566-7fd053cb65cb.png)
## [DELETE] api/contacts/id Delete contact
![image](https://user-images.githubusercontent.com/68288783/141035407-de89a329-f1bf-4edb-add9-d04b8c64852b.png)

# CRUD Labels [Method] | URI
## [POST] api/labels Create new labels
![image](https://user-images.githubusercontent.com/68288783/141035494-3ed600ec-2a9b-4609-8284-d2ea6fb5495f.png)
## [GET] api/labels Show all labels
![image](https://user-images.githubusercontent.com/68288783/141035522-b626628e-d721-48df-a929-cbf6656ba39c.png)
## [PUT] api/labels/slug Update contact
![image](https://user-images.githubusercontent.com/68288783/141035600-011feb76-f0cd-4853-8339-522fb9264770.png)
## [DELETE] api/labels/slug Delete contact
![image](https://user-images.githubusercontent.com/68288783/141035628-69c1aa93-ecc5-40ac-8d12-a13c3e34508c.png)

# Integration testings for the HTTP endpoints 
- Run command **vendor/bin/phpunit**


