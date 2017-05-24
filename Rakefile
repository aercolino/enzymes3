require 'rake/packagetask'

namespace :nzymes do
	# see http://rake.rubyforge.org/classes/Rake/PackageTask.html
	Rake::PackageTask.new('nzymes', :noversion) do |p|
		p.need_zip = true
		p.package_dir = 'dist'
		p.package_files.include('./dist/**/*')
	end

    task :default => [:update]

    desc 'delete dist folder and its contents'
    task :clean do
      rm_rf 'dist'
    end

    desc 'update dist folder and its contents'
    task :update => :clean do
      mkdir_p 'dist/nzymes/vendor'
      cp_r 'vendor/Ando', 'dist/nzymes/vendor'
      cp_r 'src', 'dist/nzymes'
      cp_r Dir.glob('*.php'), 'dist/nzymes'
      cp_r Dir.glob('*.md'), 'dist/nzymes'
      cp_r 'readme.txt', 'dist/nzymes'
      Rake::Task['nzymes:package'].invoke
    end
end
