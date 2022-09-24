<script setup>
import ParentCard from "../../components/ParentCard.vue";
import StudentCard from "../../components/StudentCard.vue";
import { useParentStore } from "../../stores/parentStore";

const parentStore = useParentStore()

parentStore.getAuthUser()
</script>
<template>
  <div class="container " v-if="parentStore.auth_user">
    <ParentCard>
      <h5 class="card-title">{{ parentStore.auth_user.first_name }} {{ parentStore.auth_user.last_name }}</h5>
      <p class="card-text">
        <b>Tel: </b>{{ parentStore.auth_user.tel }}
        <br>
        <b>Mail: </b>{{ parentStore.auth_user.email }}
      </p>
      <RouterLink :to="{ name: 'parent_edit' }" class="btn btn-primary" >Bilgileri Güncelle</RouterLink>
    </ParentCard>
    <StudentCard>
      <h5 class="card-title">{{ parentStore.auth_user.student.full_name }}</h5>
      <p class="card-text">
        <b>Öğrenci No: </b>{{ parentStore.auth_user.student.student_number }}
        <br>
        <b>Sınıfı: </b>{{ parentStore.auth_user.student.classroom }}
        <br>
        <b>Notu: </b>{{ parentStore.auth_user.student.grade }}
      </p>
    </StudentCard>
  </div>
</template>
