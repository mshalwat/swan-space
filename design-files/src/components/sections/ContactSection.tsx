import { useState } from 'react';
import { Send, Mail, Phone, MapPin } from 'lucide-react';
import { Button } from '../ui/button';
import { Input } from '../ui/input';
import { Textarea } from '../ui/textarea';
import { useLanguage } from '../../lib/LanguageContext';

export function ContactSection() {
  const { t } = useLanguage();
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    school: '',
    message: ''
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Form submitted:', formData);
    alert('Thank you for your interest! We will be in touch soon.');
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    setFormData(prev => ({
      ...prev,
      [e.target.name]: e.target.value
    }));
  };

  return (
    <section id="contact" className="py-20 relative">
      <div className="container-custom">
        <div className="max-w-6xl mx-auto">
          <div className="text-center mb-16">
            <div className="inline-block px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 mb-6">
              <span className="text-sm text-gray-300">{t.contact.badge}</span>
            </div>
            <h2 className="mb-6">
              {t.contact.title}{' '}
              <span className="text-gradient-nebula">
                {t.contact.titleHighlight}
              </span>
            </h2>
            <p className="text-xl text-gray-300 max-w-2xl mx-auto">
              {t.contact.description}
            </p>
          </div>

          <div className="grid lg:grid-cols-2 gap-12">
            {/* Contact Form */}
            <div className="glass-card-dark rounded-3xl p-8 lg:p-10 border border-purple-500/30">
              <h3 className="mb-6 text-white">{t.contact.form.title}</h3>
              <form onSubmit={handleSubmit} className="space-y-6">
                <div>
                  <label htmlFor="name" className="block text-sm mb-2 text-gray-300">
                    {t.contact.form.name} {t.contact.form.required}
                  </label>
                  <Input
                    id="name"
                    name="name"
                    type="text"
                    required
                    value={formData.name}
                    onChange={handleChange}
                    placeholder="John Doe"
                    className="bg-[#0a0e27]/50 border-purple-500/30 focus:border-purple-500 text-white placeholder:text-gray-500 rounded-xl"
                  />
                </div>

                <div>
                  <label htmlFor="email" className="block text-sm mb-2 text-gray-300">
                    {t.contact.form.email} {t.contact.form.required}
                  </label>
                  <Input
                    id="email"
                    name="email"
                    type="email"
                    required
                    value={formData.email}
                    onChange={handleChange}
                    placeholder="john@example.com"
                    className="bg-[#0a0e27]/50 border-purple-500/30 focus:border-purple-500 text-white placeholder:text-gray-500 rounded-xl"
                  />
                </div>

                <div>
                  <label htmlFor="school" className="block text-sm mb-2 text-gray-300">
                    {t.contact.form.school}
                  </label>
                  <Input
                    id="school"
                    name="school"
                    type="text"
                    value={formData.school}
                    onChange={handleChange}
                    placeholder="Your School Name"
                    className="bg-[#0a0e27]/50 border-purple-500/30 focus:border-purple-500 text-white placeholder:text-gray-500 rounded-xl"
                  />
                </div>

                <div>
                  <label htmlFor="message" className="block text-sm mb-2 text-gray-300">
                    {t.contact.form.message} {t.contact.form.required}
                  </label>
                  <Textarea
                    id="message"
                    name="message"
                    required
                    value={formData.message}
                    onChange={handleChange}
                    placeholder="Tell us about your project..."
                    className="bg-[#0a0e27]/50 border-purple-500/30 focus:border-purple-500 text-white placeholder:text-gray-500 rounded-xl min-h-[120px]"
                  />
                </div>

                <Button
                  type="submit"
                  className="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-full h-12 shadow-lg hover:shadow-purple-500/50 transition-all"
                >
                  <Send className="w-4 h-4 mr-2" />
                  {t.contact.form.send}
                </Button>
              </form>
            </div>

            {/* Contact Information */}
            <div className="space-y-8">
              <div>
                <h3 className="mb-6 text-white">{t.contact.info.title}</h3>
                <div className="space-y-6">
                  <div className="flex items-start gap-4 group">
                    <div className="relative">
                      <div className="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                      <div className="relative w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 via-pink-500 to-cyan-500 flex items-center justify-center flex-shrink-0">
                        <Mail className="w-6 h-6 text-white" />
                      </div>
                    </div>
                    <div>
                      <div className="text-sm text-gray-400 mb-1">{t.contact.info.email}</div>
                      <a href="mailto:hello@swanspace.com" className="text-white hover:text-purple-400 transition-colors">
                        hello@swanspace.com
                      </a>
                    </div>
                  </div>

                  <div className="flex items-start gap-4 group">
                    <div className="relative">
                      <div className="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                      <div className="relative w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 via-pink-500 to-cyan-500 flex items-center justify-center flex-shrink-0">
                        <Phone className="w-6 h-6 text-white" />
                      </div>
                    </div>
                    <div>
                      <div className="text-sm text-gray-400 mb-1">{t.contact.info.phone}</div>
                      <a href="tel:+15551234567" className="text-white hover:text-purple-400 transition-colors">
                        +1 (555) 123-4567
                      </a>
                    </div>
                  </div>

                  <div className="flex items-start gap-4 group">
                    <div className="relative">
                      <div className="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                      <div className="relative w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 via-pink-500 to-cyan-500 flex items-center justify-center flex-shrink-0">
                        <MapPin className="w-6 h-6 text-white" />
                      </div>
                    </div>
                    <div>
                      <div className="text-sm text-gray-400 mb-1">{t.contact.info.address}</div>
                      <p className="text-white">
                        123 Education Street<br />
                        Tech City, TC 12345
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              {/* Office Hours */}
              <div className="glass-card rounded-3xl p-8 border border-purple-500/30">
                <h4 className="mb-4 text-white">{t.contact.info.officeHours}</h4>
                <div className="space-y-3 text-gray-300">
                  <div className="flex justify-between">
                    <span>{t.contact.info.monday}</span>
                    <span>9:00 AM - 6:00 PM</span>
                  </div>
                  <div className="flex justify-between">
                    <span>{t.contact.info.saturday}</span>
                    <span>10:00 AM - 4:00 PM</span>
                  </div>
                  <div className="flex justify-between">
                    <span>{t.contact.info.sunday}</span>
                    <span>{t.contact.info.closed}</span>
                  </div>
                </div>
              </div>

              {/* Map Placeholder */}
              <div className="glass-card rounded-3xl h-64 flex items-center justify-center border border-purple-500/30 overflow-hidden relative group">
                <div className="absolute inset-0 bg-gradient-to-br from-purple-600/10 to-pink-600/10 group-hover:from-purple-600/20 group-hover:to-pink-600/20 transition-all"></div>
                <div className="text-center relative z-10">
                  <MapPin className="w-12 h-12 text-purple-400 mx-auto mb-2" />
                  <p className="text-gray-400">Map View</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
