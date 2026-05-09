<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { Rocket } from 'lucide-vue-next';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import { PencilOff } from 'lucide-vue-next';

const page = usePage();

interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}

interface PageProps {
    products: Product[];
}

//get props from inertia
const props = defineProps<PageProps>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Products',
                href: '/products',
            },
        ],
    },
});
</script>

<template>
    <Head title="Products" />

    <div class="flex flex-col gap-3 p-4">
        <div v-if="page.props.flash?.message">
            <Alert class="bg-blue-200">
                <Rocket />
                <AlertTitle>Notification</AlertTitle>
                <AlertDescription>
                    {{ page.props.flash.message }}
                </AlertDescription>
            </Alert>
        </div>
        <Link href="/products/create" class="flex items-center justify-end">
            <Button>Create Product</Button>
        </Link>
        <div>
            <table class="w-full">
                <thead class="w-full border">
                    <tr class="w-full border bg-gray-500 text-white">
                        <th class="border px-4 py-2 font-bold">Name</th>
                        <th class="border px-4 py-2 font-bold">Price</th>
                        <th class="border px-4 py-2 font-bold">Description</th>
                        <th class="border px-4 py-2 font-bold">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="w-full border hover:bg-gray-200"
                        v-for="product in products"
                        :key="product.id"
                    >
                        <td class="border px-4 py-2 text-center">
                            {{ product.name }}
                        </td>
                        <td class="border px-4 py-2 text-center">
                            ${{ product.price }}
                        </td>
                        <td class="border px-4 py-2 text-center">
                            {{ product.description }}
                        </td>
                        <td
                            class="f "
                        >
                            <Link
                                href="/products/${product.id}/edit"
                                class="flex items-center justify-end"
                            >
                                <button class="bg-gra-800 px-4 py-2 rounded-10 text-white">Edit</button>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
