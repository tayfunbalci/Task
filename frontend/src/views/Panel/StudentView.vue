<script setup>
import { useStudentStore } from "../../stores/studentStore";
import StudentItem from "../../components/Item/StudentItem.vue";
import StudentPlaceholderItem from "../../components/Item/StudentPlaceholderItem.vue";

const studentStore = useStudentStore();

studentStore.initStudent();
</script>

<template>
  <div class="container">
    <div v-if="studentStore.students != null">
      <div class="row">
        <div class="col-8">
          <p>
            <b>Toplam Öğrenci Sayısı: </b> {{ studentStore.getStudents.length }}
          </p>
        </div>
        <div class="col-4">
          <select class="form-select" v-model="studentStore.selectClass">
            <option value="all" selected>Tümünü Gör</option>
            <option v-for="(classroom, index) in studentStore.classes" :key="index" :value="index">
              {{ classroom }}
            </option>
          </select>
        </div>
      </div>
      <div class="row">
        <StudentItem v-for="student in studentStore.getStudents" :key="student">
          <div class="card-body">
            <h5>{{ student.full_name }}</h5>
            <p>
              <b>Öğrenci No: </b> {{ student.student_number }}
              <br />
              <b>Sınıfı: </b> {{ student.classroom }}. sınıf
              <br />
              <b>Notu: </b> {{ student.grade }}
              <br />
              <b>Velisi: </b> {{ student.parent.full_name }}
            </p>
          </div>
        </StudentItem>
      </div>
    </div>
    <div v-else>
      <div class="row">
        <div class="col-8 mb-3">
          <h5 class="card-title placeholder-glow">
            <span class="placeholder col-6"></span>
          </h5>
        </div>
      </div>
      <div class="row">
        <StudentPlaceholderItem v-for="i in 5" :key="i"></StudentPlaceholderItem>
      </div>
    </div>
  </div>
</template>
