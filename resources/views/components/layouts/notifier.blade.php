<div x-data="notifier" class="" @notifyalpine.window="addNotification" >
    <div class="toast toast-center lg:toast-end z-50 lg:mb-10">
        <template x-for="notification in notifications" :key="notification.id" >
            <div  class="alert cursor-pointer w-64 shadow-xl rounded-md  border-primary-content border-lg flex flex-col justify-center items-center text-center"
                  x-bind:class="notification.type"
                  {{-- x-html="notification.message" --}}
                  @click="dismiss(notification)"
                  x-show="notification.show"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="transform translate-x-full"
                  x-transition:enter-end="transform translate-x-0"
                  x-transition:leave="transition ease-in duration-300"
                  x-transition:leave-start="transform translate-x-0"
                  x-transition:leave-end="transform translate-x-full"
            >
              <div class="gap-2">
                <h2 class="font-bold text-lg text-shadow-lg">
                    <span x-show="notification.type === 'alert-success'">✅</span>
                    <span x-show="notification.type === 'alert-error'">❌</span>
                    <span x-show="notification.type === 'alert-warning'">⚠️</span>
                    <span x-show="notification.type === 'alert-info'">ℹ️</span>
                    <span x-html="notification.title"></span>
                    <span x-show="notification.type === 'alert-success'">✅</span>
                    <span x-show="notification.type === 'alert-error'">❌</span>
                    <span x-show="notification.type === 'alert-warning'">⚠️</span>
                    <span x-show="notification.type === 'alert-info'">ℹ️</span>
                </h2>
                <p class="pb-2 pt-1 text-shadow-md" x-html="notification.message">We are using cookies for no reason </p>
                <div x-show="notification.textLink || notification.accept || notification.deny" class="flex items-center justify-center gap-1 mt-2">
                  <button x-show="notification.accept" @click.stop="acceptNotification(notification)" class="btn btn-primary btn-sm rounded-sm" x-text="notification.accept"></button>
                  <button x-show="notification.deny" @click.stop="denyNotification(notification)" class="btn btn-secondary btn-sm rounded-sm" x-text="notification.deny"></button>
                  <a x-show="notification.textLink" x-text="notification.textLink" :href="notification.urlLink" target="_blank" class="btn btn-primary btn-sm rounded-sm"></a>
                </div>
              </div>
            </div>
        </template>
    </div>
</div>
<script type="text/javascript">
document.addEventListener('alpine:init', () => {
    Alpine.data('notifier', () => ({
              notifications: [],
              nextId: 1,

              init() {

              },
              addNotification(event) {
                  const params = event.detail || event;
                  let title = '', message = '', type = 'info', duration = 5000,
                      textLink = null, urlLink = null, accept = null, deny = null, data = null;

                  if (Array.isArray(params)) {
                      [title = '', message = '', type = 'info', duration = 5000,
                       textLink = null, urlLink = null, accept = null, deny = null, data = null] = params;
                  } else if (params && typeof params === 'object') {
                      title = params.title || '';
                      message = params.message || '';
                      type = params.type || 'info';
                      duration = params.duration || 5000;
                      textLink = params.textLink || null;
                      urlLink = params.urlLink || null;
                      accept = params.accept || null;
                      deny = params.deny || null;
                      data = params.data || null;
                  }

                  const types = {
                      info: 'alert-info',
                      success: 'alert-success',
                      warning: 'alert-warning',
                      error: 'alert-error'
                  };

                  this.addNewNotifications({
                      id: this.nextId++,
                      title: title,
                      message: message,
                      type: types[type] || types.info,
                      duration: duration,
                      textLink: textLink,
                      urlLink: urlLink,
                      accept: accept,
                      deny: deny,
                      data: data
                  });
              },
              addNewNotifications(payload) {
                  if (Array.isArray(payload)) {
                      payload.forEach(notif => this.addSingleNotification(notif));
                  } else if (payload && payload.id) {
                      this.addSingleNotification(payload);
                  }
              },

              addSingleNotification(livewireNotif) {
                  const exists = this.notifications.some(n => n.id === livewireNotif.id);
                  if (exists) return;

                  // Crear nueva notificación con show=true
                  const newNotif = {
                      ...livewireNotif,
                      show: true
                  };
                  // this.setIcon(newNotif);
                  // Crear un nuevo array
                  this.notifications = [newNotif, ...this.notifications];


                  // Limitar a 5 manteniendo reactividad
                  if (this.notifications.length > 5) {
                    const oldestNotification = this.notifications[this.notifications.length - 1];
                    this.dismiss(oldestNotification);
                      // this.notifications = this.notifications.slice(0, 5);
                  }

                  // Programar auto-ocultamiento
                  if (newNotif.duration > 0) {
                      setTimeout(() => {
                          this.dismiss(newNotif);
                      }, newNotif.duration);
                  }
              },

              // setIcon(newNotif) {
              //     const icons = {
              //         'alert-success': { title: '✅', message: '' },
              //         'alert-error': { title: '❌', message: '' },
              //         'alert-warning': { title: '⚠️', message: '' },
              //         'alert-info': { title: 'ℹ️', message: '' }
              //     };
              //
              //     const icon = icons[newNotif.type] || icons['alert-info'];
              //     newNotif.title = icon.title + ' ' + newNotif.title +' '+ icon.title;
              //     newNotif.message = newNotif.message + icon.message;
              // },
              acceptNotification(notification) {
                  if (notification.accept && notification.data?.functionAccept) {
                      notification.data.functionAccept();
                  }else if (notification.accept && notification.data?.eventAccept ) {
                     this.$dispatch(notification.data.eventAccept, { data: notification.data });
                  }
                  this.dismiss(notification);
              },

              denyNotification(notification) {
                  if (notification.deny && notification.data?.functionDeny) {
                      notification.data.functionDeny();
                  } else if (notification.deny && notification.data?.eventDeny) {

                      this.$dispatch(notification.data.eventDeny, { data: notification.data });
                  }
                  this.dismiss(notification);
              },

              dismiss(notification) {

                  this.notifications = this.notifications.map(n => {
                      if (n.id === notification.id) {
                          // Crear nuevo objeto con show=false
                          return { ...n, show: false };
                      }
                      return n;
                  });

                  // Eliminar después de la animación
                  setTimeout(() => {
                      this.notifications = this.notifications.filter(n => n.id !== notification.id);
                  }, 300);
              },
    }))
})
</script>
