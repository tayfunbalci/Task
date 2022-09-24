<script setup>
import { useParentStore } from "../../stores/parentStore";

const parentStore = useParentStore()
parentStore.getAuthUser()
</script>

<template>
  <div class="row" v-if="parentStore.errors != null">
    <div class="col-12">
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Hatalı İşlem!</h4>
        <ul>
          <li v-for="(error, index) in parentStore.errors" :key="index">{{ error[0] }}</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row" v-if="parentStore.update_success">
    <div class="col-12">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Başarılı İşlem!</h4>
        <p>Bilgileriniz başarıyla güncellendi...</p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Veli Bilgi Güncelleme</h5>
        <div class="card-body">
          <form @submit.prevent="parentStore.updateAuthUser()">
            <div class="row mb-3">
              <div class="col-sm-12 mb-sm-0">
                <input type="text" class="form-control" id="exampleFirstName" placeholder="Adı" v-model="parentStore.form_data.first_name" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="exampleLastName" placeholder="Soyadı" v-model="parentStore.form_data.last_name" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="exampleInputTel" placeholder="Tel" v-model="parentStore.form_data.tel" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" v-model="parentStore.form_data.email" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Şifre" v-model="parentStore.form_data.password" >
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="exampleRepeatPassword2" placeholder="Şifre Tekrar" v-model="parentStore.form_data.password_confirmation">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Güncelle</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>