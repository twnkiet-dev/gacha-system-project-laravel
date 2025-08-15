<template>
    <div class="grid h-screen place-content-center bg-[#1b172e] text-[#e1dce4]">
        <div class="grid h-full w-full place-items-center gap-5 rounded-xl bg-[#130f21] p-20">
            <img src="" alt="" />
            <h5 class="text-2xl font-bold">Sign in to your account</h5>
            <input v-model="email" type="text" name="tendangnhap" placeholder="Email"
                class="border-2 border-solid border-indigo-600 w-full rounded-xl bg-[#130f21] px-2 py-2" />
            <input v-model="password" type="password" name="matkhau" placeholder="Password"
                class="border-2 border-solid border-indigo-600 w-full rounded-xl bg-[#130f21] px-2 py-2" />
            <div class="flex w-full justify-between">
            </div>
            <button @click="login" class="w-full rounded-lg bg-[#1b172e] py-2 hover:bg-[#201b39]">
                Login
            </button>
            <button @click="goToRegister" class="w-full rounded-lg bg-[#1b172e] py-2 hover:bg-[#201b39]">
                Create account?
            </button>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const email = ref('');
const password = ref('');

const login = async () => {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/auth/login', {
      email: email.value,
      password: password.value,
    });

    console.log('Login success:', response.data);

    localStorage.setItem('token', response.data.token);

    // Chuyển hướng sau khi đăng nhập thành công
    router.push('/dashboard'); // hoặc route nào đó
  } catch (error) {
    console.error('Login failed:', error.response?.data || error.message);
    alert('Đăng nhập thất bại, kiểm tra lại thông tin');
  }
};

const goToRegister = () => {
  router.push('/register');
};
</script>
