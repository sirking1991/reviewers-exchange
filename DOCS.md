# What ReviewersExchange (RE for short)?

ReviewersExchange is a platform that address the digital gap between reviewer-material authors and reviewers. It helps author easily create their reviewer-materials and distribute it in a wider reach. It also makes it easier to reviewers to access the review-materials and learn it in a fun way.

RE consist of two parts. The first one is the web based app that authors use to create their reviewer-materials and to view a summary of their account. eg. analytics on their reviewer-material and the amount due to them. The second part is the mobile-app that is use by the reviewers. Reviewers can purchase the reviewer-materials, study, take quizzes or exam to guage their knowledge on the topic.


## TO-DOs:
- [ ] Create models
- [ ] Create author's registraton
- [ ] Create author's login
- [ ] Create author's dashboard; should contain summary and easy access to create new reviewer
- [ ] 


## NOTES:
- Models
    - User
        - id uuid
        - first_name varchar
        - last_name varchar
        - email varchar
        - email_verified_at timestamp
        - password string
        - type varchar(64) defailt:reviewer App\Enums\UserType
        - timestamps
        - softdelete
    - ReviewMaterial
        - id uuid
        - title varchar
        - description varchar
        - language varchar(64) App\Enums\Language
        - author_uuid uuid
        - currency varchar(3) default:PHP
        - price decimal
        - subject varchar(64) App\Enums\ReviwerMaterialSubject
        - timestamps 
        - softdelete
    - Chapter
        - id uuid
        - title varchar
        - review_material_uuid varchar
        - content text
        - timestamps
        - softdelete
    - Questionnaire
        - id uuid
        - title varchar
        - review_material_uuid varchar
        - chapter_uuid varchar
        - randomize_questions boolean
    - QuestionnaireItem
        - id uuid
        - questionnaire_uuid varchar cascade-delete
        - type varchar(64) defailt:multiple-option App\Enums\QuestionType
        - content text
        - randomize_possible_answers
        - possible_answers text
        - correct_answers text
    - Purchase
        - id uuid
        - reviewer_uuid foreign-key:users.id
        - author_uuid foreign-key:users.id
        - review_material_uuid foreign-key:review_materials.id
        - price decimal
        - status varchar(64) defailt:multiple-option App\Enums\PurchaseStatus
        - timestamps
        - softdelete
    - Payment
        - id uuid
        - reviewer_uuid foreign-key:users.id
        - purchase_uuid foreign-key:purchases.id
        - amount decimal
        - status varchar(64) defailt:multiple-option App\Enums\PaymentStatus
        - gateway varchar
        - gateway_details text
        - timestamps
        - softdelete    
    - Exam
        - id uuid
        - reviewer_uuid foreign-key:users.id
        - questionnaire_uuid varchar
        - questionnaire_item_uuid varchar
        - status varchar(64) defailt:multiple-option App\Enums\ExamStatus
        - correct_answers text
        - wrong_answers text
        - graded boolean
        - score double


## DESIGN DECISIONS
- Only admins & authors can login on the web
- With the help of chat-gpt api, authors can generate chapter contents & questionnaire
- Only reviewers can login to the mobile-app/API
- Once a reviewer purchase a reviewer materials, it should be downloaded to the local storage so it can be use offline
- Exam can either be graded or not.