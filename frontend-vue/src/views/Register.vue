<template>
    <div class="flex h-screen flex-col gap-10 bg-[#130f21] p-5 text-[#e1dce4]">
        <div class="flex items-center justify-between">
            <div class="w-screen text-center text-3xl font-bold uppercase">
                Đăng ký tài khoản
            </div>
            <router-link to="/building" class="rounded-lg bg-[#1b172e] p-2">
                Admin
            </router-link>
        </div>

        <div class="gap-5 flex justify-center">
            <div class="w-2xl rounded-xl bg-[#1b172e] p-5 ">
                <h1 class="text-center text-2xl font-bold">Thông tin cá nhân</h1>
                <form class="mt-4 flex flex-col gap-3">
                    
                    <div class="flex items-center gap-2">
                        <label for="ten" class="w-32">Name</label>
                        <input type="text" id="ten" placeholder="Name"
                            class="w-full rounded-lg bg-[#130f21] p-2 border-2 border-transparent" />
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="email" class="w-32">Email</label>
                        <input type="email" id="email" placeholder="Email"
                            class="w-full rounded-lg bg-[#130f21] p-2 border-2 border-transparent" />
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="sodienthoai" class="w-32">Password</label>
                        <input type="text" id="sodienthoai" placeholder="Password"
                            class="w-full rounded-lg bg-[#130f21] p-2 border-2 border-transparent" />
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="sodienthoai" class="w-32">Phone</label>
                        <input type="text" id="sodienthoai" placeholder="Phone"
                            class="w-full rounded-lg bg-[#130f21] p-2 border-2 border-transparent" />
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <label for="ngaysinh" class="w-32">Address</label>
                        <input type="text" id="address" placeholder="Address"
                            class="w-full rounded-lg bg-[#130f21] p-2 border-2 border-transparent" />
                    </div>
                </form>
            </div>

        </div>

        <div class="flex flex-col items-center gap-2">
            <div class="flex gap-2">
                <input type="checkbox" />
                <p>Thông tin trên đã chính xác</p>
            </div>
            <button class="rounded-lg bg-[#1b172e] p-2 cursor-not-allowed opacity-50" disabled>
                Đăng ký
            </button>
        </div>
    </div>
</template>

<script setup>
// Không có logic gì vì bạn yêu cầu giữ nguyên giao diện thôi
</script>

<style scoped>
/* Nếu bạn cần bổ sung css, nhưng tailwind đã dùng trong class rồi */
</style>