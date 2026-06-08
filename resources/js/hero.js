
window.trackerAlive = function tracker() {
    // const alive = {
    return {
        // propiedades del objeto
        onPrfl: false,
        onPwd: false,
        mouseDownIn: false,
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
        switchPrfl(){
          this.mouseDownIn=true;
          if (!this.onPrfl) {
            this.onPrfl=true;
            this.onPwd=false;
            this.$wire.set('editingProfile',this.onPrfl);
            this.$wire.set('editingPassword',this.onPwd);
          }
        },
        switchPwd(){
          this.mouseDownIn=true;
          if (!this.onPwd) {
            this.onPrfl=false;
            this.onPwd=true;
            this.$wire.set('editingProfile',this.onPrfl);
            this.$wire.set('editingPassword',this.onPwd);
          }
        },
        outsidePrfl(){
          this.mouseDownIn = false;
          if (this.onPrfl && !this.mouseDownIn) {
            this.onPrfl=false;

            this.$wire.set('editingProfile',this.onPrfl);
          }
        },
        outsidePwd(){
          this.mouseDownIn = false;
          if (this.onPwd && !this.mouseDownIn) {
            this.onPwd=false;
            this.$wire.set('editingPassword',this.onPwd);
          }
        },

        get badgeClasses() {
            return this.onPwd ||  this.onPrfl ? ['badge-error animate-pulse'] : ['badge-success'];
        },

        get badgeStatus(){
          return this.onPwd ||  this.onPrfl ? true : false ;
        },

    };
    // return alive;
}
if (typeof Alpine !== 'undefined') {
    Alpine.data('trackerAlive', window.trackerAlive);
}



// window.trackerAlive=tracker;
// window.subTrackerAlive=subTracker;
