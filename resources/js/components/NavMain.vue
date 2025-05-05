<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavGroup, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';

defineProps<{
    groups: NavGroup[];
}>();

const page = usePage<SharedData>();
</script>

<template>
    <SidebarGroup v-for="(group, index) in groups" :key="index" class="px-2 py-0">
        <SidebarGroupLabel>{{ group.name }}</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="(item, index) in group.items" :key="index">
                <SidebarMenuButton as-child :is-active="item.href === page.url" :tooltip="item.title">
                    <Link :href="item.href">
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
