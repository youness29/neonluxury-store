

<?php $__env->startSection('content'); ?>
<div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full py-16">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:shadow-3xl">
            
            <!-- Decorative Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-700 p-6 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-x-16 -translate-y-16"></div>
                <div class="absolute bottom-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full translate-x-16 translate-y-16"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-1">Mon Profil</h1>
                    <p class="text-blue-100">Gérez vos informations personnelles et la sécurité</p>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-8">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Tabs -->
                <ul class="flex border-b mb-6 text-gray-600 font-medium text-sm">
                    <li class="mr-4">
                        <a class="tab-link active" data-tab="info"><i class="fas fa-user mr-2"></i>Informations</a>
                    </li>
                    <li class="mr-4">
                        <a class="tab-link" data-tab="password"><i class="fas fa-lock mr-2"></i>Mot de passe</a>
                    </li>
                    <li>
                        <a class="tab-link text-red-600" data-tab="delete"><i class="fas fa-trash mr-2"></i>Supprimer</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Info -->
                    <div id="info" class="tab-pane active">
                        <form method="POST" action="<?php echo e(route('user.profile.update')); ?>" class="space-y-4">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1">Nom complet</label>
                                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1">Adresse email</label>
                                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-700 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-800 transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-save mr-2"></i>Mettre à jour
                            </button>
                        </form>
                    </div>

                    <!-- Password -->
                    <div id="password" class="tab-pane hidden">
                        <form method="POST" action="<?php echo e(route('user.profile.password')); ?>" class="space-y-4">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1">Mot de passe actuel</label>
                                <input type="password" name="current_password"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1">Nouveau mot de passe</label>
                                <input type="password" name="password"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            </div>
                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-yellow-500 to-orange-600 text-white py-3 rounded-lg font-semibold hover:from-yellow-600 hover:to-orange-700 transform transition-all duration-300 hover:scale-105">
                                <i class="fas fa-key mr-2"></i>Changer le mot de passe
                            </button>
                        </form>
                    </div>

                    <!-- Delete -->
                    <div id="delete" class="tab-pane hidden text-center">
                        <form method="POST" action="<?php echo e(route('user.profile.delete')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <p class="text-red-600 mb-4 font-medium">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Cette action est irréversible. Voulez-vous vraiment supprimer votre compte ?
                            </p>
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-trash mr-2"></i>Supprimer mon compte
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-gray-500 mt-6 text-sm">
            <i class="fas fa-lock mr-1"></i> Vos données sont protégées et chiffrées
        </p>
    </div>
</div>

<style>
.tab-link {
    cursor: pointer;
    padding-bottom: 8px;
    border-bottom: 2px solid transparent;
    transition: all 0.3s;
}
.tab-link.active {
    color: #1d4ed8;
    border-color: #3b82f6;
}
.tab-pane.hidden {
    display: none;
}
.shadow-3xl {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".tab-link");
    const panes = document.querySelectorAll(".tab-pane");

    links.forEach(link => {
        link.addEventListener("click", () => {
            links.forEach(l => l.classList.remove("active"));
            panes.forEach(p => p.classList.add("hidden"));
            link.classList.add("active");
            document.getElementById(link.getAttribute("data-tab")).classList.remove("hidden");
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zizo\led-decor\resources\views\user\profile.blade.php ENDPATH**/ ?>