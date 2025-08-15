<template>
    <div class="flex h-screen flex-col justify-between bg-[#1b172e] p-4 text-[#e1dce4]">
      <div class="col-start-1 grid gap-10">
        <div class="flex justify-between">
          <FaSchool class="size-10" />
          <button>
            <TbLayoutNavbar class="size-7 -rotate-90" />
          </button>
        </div>
  
        <div class="grid gap-2">
          <p class="text-gray-500">Favorites</p>
          <ul class="ml-5 grid gap-4">
            <li :class="['p-2', isActive('/building')]">
              <RouterLink to="/building" class="flex items-center gap-2">
                <FaRegBuilding />
                <div>User Management</div>
              </RouterLink>
            </li>
            <li :class="['p-2', isActive('/room')]">
              <RouterLink to="/room" class="flex items-center gap-2">
                <LuDoorOpen />
                <div>Card Management</div>
              </RouterLink>
            </li>
            <li :class="['p-2', isActive('/type-room')]">
              <RouterLink to="/type-room" class="flex items-center gap-2">
                <HiOutlineDocumentText />
                <div>Gacha Management</div>
              </RouterLink>
            </li>
            
          </ul>
        </div>
  
        
      </div>
  
      <div class="flex justify-between">
        <div class="flex gap-2">
          <img :src="ShinImage" alt="" class="h-10 rounded-full" />
          <div>
            <p>{{ user?.tendangnhap || "Guest" }}</p>
            <p class="text-gray-500">{{ user?.vaitro || "No role" }}</p>
          </div>
        </div>
        <button @click="handleLogout">
          <IoLogOutOutline class="size-7" />
        </button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import { useRoute, useRouter, RouterLink } from "vue-router";
  
  import ShinImage from "../assets/shin.jpg";
  
  // import icons từ vue-icons tương tự
  import { FaRegBuilding, FaSchool } from "vue-icons/fa";
  import { HiOutlineDocumentText } from "vue-icons/hi";
  import { IoLogOutOutline } from "vue-icons/io5";
  import { TbLayoutNavbar } from "vue-icons/tb";
  import { LuDoorOpen } from "vue-icons/lu";
  import { RiWaterFlashLine } from "vue-icons/ri";
  import { MdPersonOutline, MdSupportAgent } from "vue-icons/md";
  
  const route = useRoute();
  const router = useRouter();
  
  const user = ref(null);
  
  onMounted(() => {
    const userStr = localStorage.getItem("user");
    if (userStr) {
      user.value = JSON.parse(userStr);
    }
  });
  
  const isActive = (path) => {
    return route.path === path ? "bg-[#201b39] rounded-lg" : "";
  };
  
  const handleLogout = () => {
    localStorage.removeItem("user");
    router.push("/login");
  };
  </script>
  
  <style scoped>
  /* giữ nguyên các class tailwind đã dùng hoặc thêm style nếu cần */
  </style>
  