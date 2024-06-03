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
    - ReviewMaterial
    - Questionnaire
    - Purchase
    - Payment
    - Quiz
    - Exam

## DESIGN DECISIONS
- Only admins & authors can login on the web
- Only reviewers can login to the mobile-app/API
- Once a reviewer purchase a reviewer materials, it should be downloaded to the local storage so it can be use offline
- Quizzes are quick knowledge check on certain topics and are not graded.
- Exams are tests on subjects are are graded.
