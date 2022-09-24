# Task

Backend tarafında seed işleminde birden fazla kullanıcı oluşturulduğundan ve mailtrap üzerinden mail gittiği için observer'da APP_DEBUG kontrolü yaptım. 

Seed işleminde APP_DEBUG=true olmalı. Proje kullanım durumunda APP_DEBUG=false olmalı.

Frontend tarafında src/config.js içinde aşağıdaki bilgiler yer almakta. APP_NAME token oluştururken kullanılmakta.

```js
export default {
    APP_NAME: 'turk_ai_task',
    API_URL: 'http://localhost:8000/api'
}
```

Vue uygulaması üzerinden hesap oluşturma işleminde kullanılacak tanımlı kodlar: ==1Ae5rE8Q==  ==2SY6LSPe== ==3q9pjI72== ==4IOps85w== ==5kRe89E7==
