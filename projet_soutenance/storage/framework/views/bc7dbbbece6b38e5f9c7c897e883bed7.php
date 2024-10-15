

<?php $__env->startSection('content'); ?>

    <html><head>
        <title>Submit Your Valuable Feedback</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </head>
        <body class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4 py-8 max-w-2xl">
           <h1 class="text-4xl font-bold text-center mb-2 flex items-center justify-center text-indigo-700">
             <i class="fas fa-comments text-yellow-500 mr-4 animate-bounce"></i>
             Share Your Thoughts
           </h1>
           
           <p class="text-center text-gray-600 mb-8 italic">"Your feedback shapes our future"</p>
        
            <?php if(session('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-md" role="alert">
                    <p class="font-bold">Success!</p>
                    <p><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>
        
            <form action="<?php echo e(route('client.store')); ?>" method="POST" class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 transform hover:scale-105 transition duration-300">
                <?php echo csrf_field(); ?>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
                        <i class="fas fa-pencil-alt mr-2 text-indigo-500"></i>Your Comment
                    </label>
                    <textarea name="comment" id="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300" rows="4" required placeholder="We value your opinion..."></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                        <i class="fas fa-star mr-2 text-yellow-500"></i>Your Rating
                    </label>
                    <div class="relative">
                        <select name="rating" id="rating" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300" required>
                            <option value="">Select a rating</option>
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline transform hover:scale-110 transition duration-300 ease-in-out">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Feedback
                    </button>
                </div>
            </form>
        </div>
        <?php $__env->stopSection(); ?>
        <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              },
              animation: {
                bounce: 'bounce 1s infinite',
              },
              keyframes: {
                bounce: {
                  '0%, 100%': { transform: 'translateY(-25%)', animationTimingFunction: 'cubic-bezier(0.8, 0, 1, 1)' },
                  '50%': { transform: 'translateY(0)', animationTimingFunction: 'cubic-bezier(0, 0, 0.2, 1)' },
                }
              }
            }
          }
        }
        </script>
        </body></html>
<?php echo $__env->make('client.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app_acceil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/client/create.blade.php ENDPATH**/ ?>