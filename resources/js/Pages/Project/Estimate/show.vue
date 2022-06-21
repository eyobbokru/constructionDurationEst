<template>
    <AdminLayout title="create parameter">

           <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">Estimate </h2>
            </template>

            <div class="py-2">
                <div class="max-w-7xl mx-auto">
                      <section class="container mx-auto p-6 font-mono">
                           
                             <div
                                class="
                                w-full
                                mb-8
                            
                                p-6
                                overflow-hidden
                                bg-white
                                rounded-lg
                                shadow-lg

                                "
                            >
    <!-- sm:max-w-md -->
                                <form @submit.prevent="storeProject">
                                    <div v-for="sub in subs" :key="sub.id">
                                      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">{{sub.name}} </h2>
                                    
                                       <div  v-for="option in options" :key="option.id">
                                  <div  v-if="option.sub_category_id==sub.id">
                                           <jet-label for="Parameter" :value="option.name" v-if="option.dataType==2" />
                                                <select
                                                id="select"
                                                class="mt-1 inline w-1/2"
                                                v-model="form.sub_category_id"
                                                autofocus required
                                                v-if="option.dataType==2"
                                                >
                                             
                                                   <option  v-for="opt in option.pram_fields_options" :key="opt.id" > {{opt.name}}</option> 
                                                </select>

                                                <div class="text-sm text-red-400" v-if="form.errors.sub_category_id">
                                                {{ form.errors.sub_category_id }}
                                                </div>

                                            <jet-label for="title" :value="option.name" v-if="option.dataType==1"/>
                                                <jet-input
                                                id="title"
                                                type="text"
                                                class="mt-1 inline w-1/2"
                                                v-model="form.name"
                                                autofocus
                                                autocomplete="title"
                                                v-if="option.dataType==1"
                                                required
                                                />
                                                <div class="text-sm text-red-400" v-if="form.errors.name">
                                                {{ form.errors.name }}
                                                </div>
                                              <jet-label class="inline ml-3" for="title" :value="option.unit" v-if="option.dataType==1"/>

                                         </div>

                                            </div>
                                         </div>

                                                    

                                
                                  
                    
                                          <div class="flex items-center  mt-4">
                                                    <jet-button
                                                    class="ml-4"
                                                    :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing"
                                                    >
                                                    Estimate
                                                    </jet-button>
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
 subs:Object,
 options:Object,


});



const form = useForm({

  name: "",
  detail:"",
  
});



function storeProject() {
   
}


</script>
