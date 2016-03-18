
task :default => [:update]

desc "delete dist folder and its contents"
task :clean do
  rm_rf 'dist'
end

desc "update dist folder and its contents"
task :update do
  mkdir_p 'dist'
  cp_r 'vendor', 'dist'
  cp_r 'src', 'dist'
  cp_r Dir.glob('*.php'), 'dist'
  cp_r 'readme.txt', 'dist'
end
