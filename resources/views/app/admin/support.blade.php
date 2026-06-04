<x-layouts::app :title="__('Help & Support')">
    <div style="padding: 24px;">
        <div class="page-header" style="margin-bottom: 24px;">
            <h2 style="font-size:20px;font-weight:700;color:var(--gray-800);">Help & Support Tickets</h2>
            <p style="font-size:13px;color:var(--gray-500);margin-top:2px;">View and respond to support requests from students and partner companies</p>
        </div>
        
        <livewire:admin.support-tickets />
    </div>
</x-layouts::app>
