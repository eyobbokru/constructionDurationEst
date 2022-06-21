<template>
    <AdminLayout title="create parameter">

           <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Parameter </h2>
            </template>

            <div class="py-2">
                <div class="max-w-7xl mx-auto">
                      <section class="container mx-auto p-6 font-mono">
                            <div class="w-full flex mb-4 p-2">
                                <Link
                                     :href="route('admin.parameter.index')"
                                      class="
                                                bg-green-500
                                                hover:bg-green-700
                                                text-white
                                                px-4
                                                py-2
                                                rounded-lg
                                            "
                                            >
                                            Back 
                                  </Link>
                            </div>

                             <div
                                class="
                                w-full
                                mb-8
                                sm:max-w-md
                                p-6
                                overflow-hidden
                                bg-white
                                rounded-lg
                                shadow-lg
                                "
                            >

                                <form @submit.prevent="storeProject">
                                    <div>
                                        
                                            <jet-label for="name" value="Project Name" />
                                                <jet-input
                                                id="name"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.name"
                                                autofocus
                                                autocomplete="name"
                                                required
                                                />
                                                <div class="text-sm text-red-400" v-if="form.errors.name">
                                                {{ form.errors.name }}
                                                </div>

                                                 <jet-label for="detail" value="Project Detail" />
                                                <textarea 
                                                id="detail"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.detail"
                                                autofocus
                                                autocomplete="detail"
                                                required
                                                ></textarea>

                                                <div class="text-sm text-red-400" v-if="form.errors.detail">
                                                {{ form.errors.detail }}
                                                </div>

                                               
                                            <div class="flex items-center  mt-4">
                                                    <jet-button
                                                    class="ml-4"
                                                    :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing"
                                                    >
                                                    ADD
                                                    </jet-button>
                                                </div>
                                           </div>

                                </form>
                             </div>


                      </section>
                </div>

            </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetTextarea from "@/Jetstream/textarea.vue";

import JetLabel from "@/Jetstream/Label.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";

const props = defineProps({
//   parameters: Object,
//   data_Type:Object


});


const form = useForm({

  name: "",
  detail:"",
  
});



function storeProject() {
   
  form.post("/user/project");
}


</script>
