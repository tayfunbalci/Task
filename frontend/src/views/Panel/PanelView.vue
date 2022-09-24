<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-3">
        <div class="card">
          <div class="card-header">
            Menü
          </div>
          <ul class="list-group list-group-flush">
            <RouterLink to="/panel" class="list-group-item" >Panel</RouterLink>
            <RouterLink to="/panel/parent" class="list-group-item">Veli Bilgisi</RouterLink>
            <RouterLink to="/panel/student" class="list-group-item">Okul Öğrencileri</RouterLink>
          </ul>
        </div>
      </div>
      <div class="col-9">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>