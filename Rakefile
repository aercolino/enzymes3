require 'rake/packagetask'

namespace :nzymes do
    desc 'Build plugin'
    task build: %w(destroy create package)

    desc 'Destroy dist folder and its contents'
    task :destroy do
      rm_rf 'dist'
    end

    desc 'Create dist folder and its contents'
    task :create do
      mkdir_p 'dist/nzymes/vendor'
      cp_r 'vendor/Ando', 'dist/nzymes/vendor'
      mkdir_p 'dist/nzymes/assets'
      cp_r Dir.glob('assets/*.png'), 'dist/nzymes/assets'
      cp_r 'src', 'dist/nzymes'
      cp_r Dir.glob('*.php'), 'dist/nzymes'
      cp_r Dir.glob('*.md'), 'dist/nzymes'
      cp_r 'readme.txt', 'dist/nzymes'
    end

    Rake::PackageTask.new('nzymes', :noversion) do |p|
      p.need_zip = true
      p.package_dir = 'dist'
    end
end
