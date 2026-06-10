<div x-data="chatbot()" class="chatbot-container" style="position: fixed; bottom: 24px; right: 24px; z-index: 9999;">
    
    <!-- Chat Window -->
    <div x-show="isOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="chat-window" 
         style="width: 350px; height: 450px; background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-hover); display: flex; flex-direction: column; overflow: hidden; margin-bottom: 16px; border: 1px solid var(--border-medium);">
        
        <!-- Header -->
        <div style="background: var(--text-primary); color: var(--white); padding: 16px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 8px; height: 8px; background: #4ADE80; border-radius: 50%;"></div>
                <h3 style="font-size: 16px; font-weight: 600;">RADNEWS AI</h3>
            </div>
            <button @click="isOpen = false" style="background: transparent; border: none; color: var(--white); cursor: pointer;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" style="flex: 1; padding: 16px; overflow-y: auto; display: flex; flex-direction: column; gap: 12px; background: var(--bg-secondary);">
            <div style="align-self: flex-start; background: var(--white); padding: 10px 14px; border-radius: 12px 12px 12px 0; box-shadow: var(--shadow-l1); max-width: 85%; font-size: 14px;">
                Halo! Saya asisten AI RiauAktifdigital. Ada yang bisa saya bantu?
            </div>

            <template x-for="(msg, index) in messages" :key="index">
                <div :style="msg.role === 'user' ? 'align-self: flex-end; background: var(--text-primary); color: var(--white); padding: 10px 14px; border-radius: 12px 12px 0 12px; max-width: 85%; font-size: 14px;' : 'align-self: flex-start; background: var(--white); color: var(--text-primary); padding: 10px 14px; border-radius: 12px 12px 12px 0; box-shadow: var(--shadow-l1); max-width: 85%; font-size: 14px;'" x-html="msg.content">
                </div>
            </template>

            <!-- Loading Indicator -->
            <div x-show="isLoading" style="align-self: flex-start; background: var(--white); padding: 10px 14px; border-radius: 12px 12px 12px 0; box-shadow: var(--shadow-l1); display: flex; gap: 4px; align-items: center;">
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
            </div>
        </div>

        <!-- Input Area -->
        <form @submit.prevent="sendMessage" style="padding: 12px; background: var(--white); border-top: 1px solid var(--border-medium); display: flex; gap: 8px;">
            <input type="text" x-model="inputMessage" placeholder="Ketik pesan..." required style="flex: 1; border: 1px solid var(--border-medium); border-radius: var(--radius-full); padding: 8px 16px; font-size: 14px; outline: none;">
            <button type="submit" :disabled="isLoading" style="background: var(--text-primary); color: white; border: none; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="transform: rotate(90deg);"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m-7 7l7-7 7 7"></path></svg>
            </button>
        </form>
    </div>

    <!-- Floating Button -->
    <button @click="isOpen = !isOpen" style="width: 60px; height: 60px; border-radius: 50%; background: var(--text-primary); color: var(--white); border: none; box-shadow: var(--shadow-hover); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: transform 0.2s; position: absolute; bottom: 0; right: 0;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <svg x-show="!isOpen" width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        <svg x-show="isOpen" width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>

</div>

<style>
.typing-dot {
    width: 6px;
    height: 6px;
    background: var(--text-secondary);
    border-radius: 50%;
    animation: typing 1.4s infinite both;
}
.typing-dot:nth-child(1) { animation-delay: 0s; }
.typing-dot:nth-child(2) { animation-delay: 0.2s; }
.typing-dot:nth-child(3) { animation-delay: 0.4s; }

@keyframes typing {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

@media (max-width: 480px) {
    .chat-window {
        position: fixed;
        inset: 0;
        width: 100% !important;
        height: 100% !important;
        margin-bottom: 0 !important;
        border-radius: 0 !important;
        z-index: 10000;
    }
}
</style>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('chatbot', () => ({
        isOpen: false,
        isLoading: false,
        inputMessage: '',
        messages: [],

        async sendMessage() {
            if (!this.inputMessage.trim()) return;

            const userMsg = this.inputMessage;
            this.messages.push({ role: 'user', content: userMsg });
            this.inputMessage = '';
            this.isLoading = true;
            this.scrollToBottom();

            try {
                const response = await fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: userMsg })
                });

                const data = await response.json();
                this.messages.push({ role: 'bot', content: data.reply });
            } catch (error) {
                this.messages.push({ role: 'bot', content: 'Maaf, gagal terhubung ke server.' });
            } finally {
                this.isLoading = false;
                this.scrollToBottom();
            }
        },

        scrollToBottom() {
            setTimeout(() => {
                const chatBox = document.getElementById('chat-messages');
                if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
            }, 100);
        }
    }));
});
</script>
