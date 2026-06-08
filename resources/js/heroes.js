
window.trackerAlive = function tracker() {
    // const alive = {
    return {
        // propiedades del objeto
        newBoxOpen: false,
        editBoxOpen: false,
        applyWideMainClass: false,
        // organization: JSON.parse(this.$wire.organizationJson),

        init() {
            // console.log('Current:', this.$wire);
            // this.newBoxOpen = this.$wire.entangle('newBoxOpen').live;
            // this.$wire.on('doSwitchEditBox', () => {
            //     this.switchNewBox(); // Call your Alpine function
            // });
            // // Escuchar el evento refreshConfigApp de Livewire
            // this.$wire.on('refreshConfigApp', () => {
            //     this.refreshOrganization();
            // });

        },
        // refreshOrganization() {
        //     // Obtener los datos actualizados de Livewire
        //     this.$nextTick(() => {
        //         //  Ahora SÍ tenemos los datos actualizados despues de recargar el DOM
        //         // this.organization = JSON.parse(this.$wire.organizationJson);
        //         // console.log('Organización refrescada:', this.organization);
        //     });
        // },
        switchNewBox() {
            this.newBoxOpen = !this.newBoxOpen;
            this.$wire.set('newBoxOpen', this.newBoxOpen);
            if (this.applyWideClass) {
              setTimeout(() => {
                 this.applyWideClass = !this.applyWideClass;
               }, 500);
            }else {
              this.applyWideClass = !this.applyWideClass;
            }

            // console.log(this.$wire.newBoxOpen);

        },
        switchEditBox() {
            this.editBoxOpen = !this.editBoxOpen;
            this.$wire.set('editBoxOpen', this.editBoxOpen);
            if (this.applyWideClass) {
              setTimeout(() => {
                 this.applyWideClass = !this.applyWideClass;
               }, 500);
            }else {
              this.applyWideClass = !this.applyWideClass;
            }
            // console.log(this.$wire.newBoxOpen);

        },
        get mainClasses() {
          return this.applyWideClass ? ['lg:w-2/3'] : [''];
        },
        get newBoxOpenedClasses() {
            return this.newBoxOpen ||  this.editBoxOpen ? ['bg-base-100'] : ['bg-base-300/30'];
        },
        get newBoxOpenedBadgeClasses() {
            return this.newBoxOpen ||  this.editBoxOpen ? ['badge-error animate-pulse'] : ['badge-warning'];
        },
        get newBoxOpenedOverlayClasses(){
          return this.newBoxOpen ||  this.editBoxOpen ? ['visible'] : ['invisible'];
        },
        //
        // get editBoxOpenedClasses() {
        //     return this.editBoxOpen ? ['bg-base-100'] : ['bg-base-300/30'];
        // },
        // get editBoxOpenedBadgeClasses() {
        //     return this.editBoxOpen ? ['badge-error animate-pulse'] : ['badge-warning'];
        // },
        // get editBoxOpenedOverlayClasses(){
        //   return this.editBoxOpen ? ['visible'] : ['invisible'];
        // }
    };
    // return alive;
}
if (typeof Alpine !== 'undefined') {
    Alpine.data('trackerAlive', window.trackerAlive);
}

window.subTrackerAlive = function subTracker(){
  return{
    showNewButton:true,
    switchShowNewButton(){
      this.showNewButton=!this.showNewButton;
      // console.log(this.showNewButton);
    },
  };

}

if (typeof Alpine !== 'undefined') {
    Alpine.data('subTrackerAlive', window.subTrackerAlive);
}


// window.trackerAlive=tracker;
// window.subTrackerAlive=subTracker;
