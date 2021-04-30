export default async function ({
  redirect,
  route
}) {
  // If the user is not authenticated
  
  if (process.browser) {
    const route_path = route.path;
    const local = JSON.parse(window.localStorage.getItem('vuex'));
    console.log("local ==> ", local)
    if (local) {
      const user = local.application.user;
      if ((user === null || user === undefined)) {
        console.log('user was redirected to login');

      } else if (user !== null && user.username && (route_path === '/')) {
        console.log('user was redirected to videos');
        redirect('/videos');
      }
    } else {
      redirect('/login');
    }
  }
}
